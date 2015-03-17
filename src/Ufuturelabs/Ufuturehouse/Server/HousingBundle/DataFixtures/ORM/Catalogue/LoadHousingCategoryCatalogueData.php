<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HousingCategoryCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadHousingCategoryCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    function load(ObjectManager $manager)
    {
        $catalogues = array(
            new HousingCategoryCatalogue('catalogue.building_type.in_short'),
            new HousingCategoryCatalogue('catalogue.building_type.on_building'),
            new HousingCategoryCatalogue('catalogue.building_type.latest_finishes'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
