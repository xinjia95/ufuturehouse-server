<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Tests\Util;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Util\Util;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ConservationStatusCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Flat;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\City;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\State;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Zone;

class UtilTest extends KernelTestCase
{
    /** @var Util */
    private $util;

    /** @var EntityManager $em */
    private $em;

    /** @var string */
    private $kernelRootDir;

    public function setUp()
    {
        self::bootKernel();
        $this->kernelRootDir = static::$kernel->getRootDir();
        $this->util = static::$kernel->getContainer()->get('ufuturehouse.util');
        $this->em = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');
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
        /** @var Flat[] $flats */
        $flats = $this->em->getRepository('HousingBundle:Residence\ResidenceVertical\Flat')->findAll();

        if (is_null($flats) || count($flats) == 0)
        {
            // If not exists create one
            $flat = new Flat();
            $flat->setDescription('Description');
            $flat->setOnSale(true);
            $flat->setForRent(false);
            $flat->setSold(false);
            $flat->setRented(false);
            $flat->setConservationStatus(new ConservationStatusCatalogue('catalogue.conservation_status.good'));
            $flat->setFloorArea(81);
            $flat->setAddress('Av. Ajalvir, 8, 28806');
            $flat->setBuildingYear('1970');
            $flat->setPrice(87260);
            $flat->setAvailabilityDate(new \DateTime());

            $state = new State();
            $state->setName('State');
            $flat->setLocationState($state);

            $city = new City();
            $city->setName('City');
            $city->setState($state);
            $flat->setCity($city);

            $zone = new Zone();
            $zone->setName('Zone');
            $zone->setCity($city);
            $flat->setZone($zone);

            $this->assertNotEmpty($this->util->generateHousingSlug($flat));
        }
        else
        {
            $this->assertEquals($flats[0]->getSlug(), $this->util->generateHousingSlug($flats[0]));
        }
    }
}
