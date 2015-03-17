<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\DoorwayStatusCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadDoorwayStatusCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    function load(ObjectManager $manager)
    {
        $catalogues = array(
            new DoorwayStatusCatalogue('catalogue.doorway_status.singular'),
            new DoorwayStatusCatalogue('catalogue.doorway_status.good'),
            new DoorwayStatusCatalogue('catalogue.doorway_status.regular'),
            new DoorwayStatusCatalogue('catalogue.doorway_status.bad'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
