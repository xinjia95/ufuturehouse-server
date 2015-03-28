<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ParkingSpaceTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadParkingSpaceTypeCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    public function load(ObjectManager $manager)
    {
        $catalogues = array(
            new ParkingSpaceTypeCatalogue('catalogue.parking_space_type.covered'),
            new ParkingSpaceTypeCatalogue('catalogue.parking_space_type.uncovered'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
