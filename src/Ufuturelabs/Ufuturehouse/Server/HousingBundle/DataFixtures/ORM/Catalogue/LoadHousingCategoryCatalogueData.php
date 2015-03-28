<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HousingCategoryCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadHousingCategoryCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    public function load(ObjectManager $manager)
    {
        $catalogues = array(
            new HousingCategoryCatalogue('catalogue.housing_category.official_protection'),
            new HousingCategoryCatalogue('catalogue.housing_category.rent_limited_class_1'),
            new HousingCategoryCatalogue('catalogue.housing_category.rent_limited_class_2'),
            new HousingCategoryCatalogue('catalogue.housing_category.free'),
            new HousingCategoryCatalogue('catalogue.housing_category.regional_housing_protection'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
