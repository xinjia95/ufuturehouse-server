<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\BuildingTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadBuildingTypeCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    function load(ObjectManager $manager)
    {
        $catalogues = array(
            new BuildingTypeCatalogue('catalogue.building_type.economic'),
            new BuildingTypeCatalogue('catalogue.building_type.civil'),
            new BuildingTypeCatalogue('catalogue.building_type.middle_manor'),
            new BuildingTypeCatalogue('catalogue.building_type.manor'),
            new BuildingTypeCatalogue('catalogue.building_type.epoch'),
            new BuildingTypeCatalogue('catalogue.building_type.corrala'), // Tipical spanish
            new BuildingTypeCatalogue('catalogue.building_type.other'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
