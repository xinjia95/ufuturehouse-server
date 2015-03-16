<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HotWaterTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadHotWaterTypeCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    function load(ObjectManager $manager)
    {
        $catalogues = array(
            new HotWaterTypeCatalogue('catalogue.hot_water_type.yes'),
            new HotWaterTypeCatalogue('catalogue.hot_water_type.natural_gas'),
            new HotWaterTypeCatalogue('catalogue.hot_water_type.propane'),
            new HotWaterTypeCatalogue('catalogue.hot_water_type.gasoil'),
            new HotWaterTypeCatalogue('catalogue.hot_water_type.carbon'),
            new HotWaterTypeCatalogue('catalogue.hot_water_type.butane'),
            new HotWaterTypeCatalogue('catalogue.hot_water_type.electric'),
            new HotWaterTypeCatalogue('catalogue.hot_water_type.solar_panel'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
