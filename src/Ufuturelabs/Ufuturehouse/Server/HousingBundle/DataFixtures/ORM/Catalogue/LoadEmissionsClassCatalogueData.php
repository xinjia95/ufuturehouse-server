<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\EmissionsClassCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadEmissionsClassCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    function load(ObjectManager $manager)
    {
        $catalogues = array(
            new EmissionsClassCatalogue('catalogue.emissions_class.a'),
            new EmissionsClassCatalogue('catalogue.emissions_class.b'),
            new EmissionsClassCatalogue('catalogue.emissions_class.c'),
            new EmissionsClassCatalogue('catalogue.emissions_class.d'),
            new EmissionsClassCatalogue('catalogue.emissions_class.e'),
            new EmissionsClassCatalogue('catalogue.emissions_class.f'),
            new EmissionsClassCatalogue('catalogue.emissions_class.g'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
