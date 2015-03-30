<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\BuildingTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\NewBuildingStatusCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadNewBuildingStatusCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    public function load(ObjectManager $manager)
    {
        $catalogues = array(
            new NewBuildingStatusCatalogue('catalogue.new_building_status.in_short'),
            new NewBuildingStatusCatalogue('catalogue.new_building_status.on_building'),
            new NewBuildingStatusCatalogue('catalogue.new_building_status.on_project'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
