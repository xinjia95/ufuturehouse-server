<?php
namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Tests\Form\Type\Catalogue;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Catalogue\BuildingTypeCatalogueType;

class BuildingTypeCatalogueTypeTest extends KernelTestCase
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
        $catalogueType = new BuildingTypeCatalogueType($this->em);
        $catalogues = $this->em->getRepository('HousingBundle:Catalogue\BuildingTypeCatalogue')->findAll();
        $this->assertNotCount(0, $catalogues);
        $this->assertEquals('choice', $catalogueType->getParent());
        $this->assertEquals('catalogue_building_type', $catalogueType->getName());
    }
}
