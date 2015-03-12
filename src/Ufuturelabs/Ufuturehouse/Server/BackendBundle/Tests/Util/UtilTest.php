<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Tests\Util;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Util\Util;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\City;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\State;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Zone;

class UtilTest extends KernelTestCase
{
    /** @var Util */
    private $util;

    /** @var ContainerInterface */
    private $container;

    /** @var string */
    private $kernelRootDir;

    public function setUp()
    {
        self::bootKernel();
        $this->kernelRootDir = static::$kernel->getRootDir();
        $this->container = static::$kernel->getContainer();
        $this->util = new Util($this->kernelRootDir, $this->container);
    }

    public function testGetDirs()
    {
        $this->assertEquals($this->kernelRootDir.'/../web/', $this->util->getWebDir());
        $this->assertEquals('uploads', $this->util->getUploadDir());
        $this->assertEquals($this->kernelRootDir.'/../web/uploads', $this->util->getAbsoluteUploadDir());
        $this->assertEquals('uploads/images', $this->util->getUploadImagesDir());
        $this->assertEquals($this->kernelRootDir.'/../web/uploads/images', $this->util->getAbsoluteUploadImagesDir());
    }

    public function testGenerateFilename()
    {
        $this->assertNotNull($this->util->generateFilename('jpg'));
        $this->assertNotNull($this->util->generateFilename('png'));
        $this->assertNotNull($this->util->generateFilename('gif'));
    }

    public function testGenerateHousingSlug()
    {
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine')->getManager();

        /** @var Housing[] $housings */
        $housings = $em->getRepository('HousingBundle:Housing')->findLast(1);

        if ($housings === null || count($housings) == 0)
        {
            // If not exists create one
            $housing = new Housing();
            $housing->setDescription('Description');
            $housing->setOnSale(true);
            $housing->setState('Good');
            $housing->setFloorArea(81);
            $housing->setAddress('Av. Ajalvir, 8, 28806');
            $housing->setBuildingYear('1970');
            $housing->setPrice(87260);
            $housing->setAvailabilityDate(new \DateTime());
            $housing->setLocationState(new State());
            $housing->setCity(new City());
            $housing->setZone(new Zone());

            $this->assertNotEmpty($this->util->generateHousingSlug($housing));
        }
        else
        {
            $this->assertEquals($housings[0]->getSlug(), $this->util->generateHousingSlug($housings[0]));
        }
    }
}
