<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\OrientationCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadOrientationCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    function load(ObjectManager $manager)
    {
        $catalogues = array(
            new OrientationCatalogue('catalogue.orientation.east'),
            new OrientationCatalogue('catalogue.orientation.northeast'),
            new OrientationCatalogue('catalogue.orientation.northwest'),
            new OrientationCatalogue('catalogue.orientation.north'),
            new OrientationCatalogue('catalogue.orientation.west'),
            new OrientationCatalogue('catalogue.orientation.south'),
            new OrientationCatalogue('catalogue.orientation.southeast'),
            new OrientationCatalogue('catalogue.orientation.southwest'),
            new OrientationCatalogue('catalogue.orientation.north_northeast'),
            new OrientationCatalogue('catalogue.orientation.north_east'),
            new OrientationCatalogue('catalogue.orientation.north_southeast'),
            new OrientationCatalogue('catalogue.orientation.north_south'),
            new OrientationCatalogue('catalogue.orientation.north_west'),
            new OrientationCatalogue('catalogue.orientation.northeast_east'),
            new OrientationCatalogue('catalogue.orientation.northeast_southeast'),
            new OrientationCatalogue('catalogue.orientation.northeast_south'),
            new OrientationCatalogue('catalogue.orientation.northeast_southwest'),
            new OrientationCatalogue('catalogue.orientation.northeast_northwest'),
            new OrientationCatalogue('catalogue.orientation.east_southeast'),
            new OrientationCatalogue('catalogue.orientation.east_south'),
            new OrientationCatalogue('catalogue.orientation.east_southwest'),
            new OrientationCatalogue('catalogue.orientation.east_west'),
            new OrientationCatalogue('catalogue.orientation.east_northwest'),
            new OrientationCatalogue('catalogue.orientation.southeast_south'),
            new OrientationCatalogue('catalogue.orientation.southeast_southwest'),
            new OrientationCatalogue('catalogue.orientation.southeast_west'),
            new OrientationCatalogue('catalogue.orientation.southeast_northwest'),
            new OrientationCatalogue('catalogue.orientation.south_southwest'),
            new OrientationCatalogue('catalogue.orientation.south_west'),
            new OrientationCatalogue('catalogue.orientation.south_northwest'),
            new OrientationCatalogue('catalogue.orientation.southwest_west'),
            new OrientationCatalogue('catalogue.orientation.southwest_northwest'),
            new OrientationCatalogue('catalogue.orientation.west_northeast'),
            new OrientationCatalogue('catalogue.orientation.total'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
