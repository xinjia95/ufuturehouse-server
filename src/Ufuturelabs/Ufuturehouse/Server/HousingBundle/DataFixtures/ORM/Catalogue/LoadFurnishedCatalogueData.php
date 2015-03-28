<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\FurnishedCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadFurnishedCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    public function load(ObjectManager $manager)
    {
        $catalogues = array(
            new FurnishedCatalogue('catalogue.furnished.all'),
            new FurnishedCatalogue('catalogue.furnished.semifurnished'),
            new FurnishedCatalogue('catalogue.furnished.kitchen_bathroom'),
            new FurnishedCatalogue('catalogue.furnished.kitchen'),
            new FurnishedCatalogue('catalogue.furnished.kitchen_without_appliances'),
            new FurnishedCatalogue('catalogue.furnished.negotiable'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
