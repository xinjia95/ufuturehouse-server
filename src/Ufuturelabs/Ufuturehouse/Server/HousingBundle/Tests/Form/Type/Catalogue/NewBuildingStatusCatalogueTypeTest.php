<?php
namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Tests\Form\Type\Catalogue;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Catalogue\AirConditioningTypeCatalogueType;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Catalogue\NewBuildingStatusCatalogueType;

class NewBuildingStatusCatalogueTypeTest extends KernelTestCase
{
    /** @var EntityManager $em */
    private $em;

    public function setUp()
    {
        self::bootKernel();
        $this->em = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');
    }

    public function testCreateType()
    {
        $catalogueType = new NewBuildingStatusCatalogueType($this->em);
        $catalogues = $this->em->getRepository('HousingBundle:Catalogue\NewBuildingStatusCatalogue')->findAll();
        $this->assertNotCount(0, $catalogues);
        $this->assertEquals('choice', $catalogueType->getParent());
        $this->assertEquals('catalogue_new_building_status', $catalogueType->getName());
    }
}
