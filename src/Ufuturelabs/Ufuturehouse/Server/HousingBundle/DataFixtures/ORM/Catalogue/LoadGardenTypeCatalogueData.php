<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\GardenTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadGardenTypeCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    function load(ObjectManager $manager)
    {
        $catalogues = array(
            new GardenTypeCatalogue('catalogue.garden_type.yes'),
            new GardenTypeCatalogue('catalogue.garden_type.communal'),
            new GardenTypeCatalogue('catalogue.garden_type.private'),
            new GardenTypeCatalogue('catalogue.garden_type.consolidated'),
            new GardenTypeCatalogue('catalogue.garden_type.panoramic'),
            new GardenTypeCatalogue('catalogue.garden_type.picturesque'),
            new GardenTypeCatalogue('catalogue.garden_type.easy_maintenance'),
            new GardenTypeCatalogue('catalogue.garden_type.spanish'),
            new GardenTypeCatalogue('catalogue.garden_type.tropical'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
