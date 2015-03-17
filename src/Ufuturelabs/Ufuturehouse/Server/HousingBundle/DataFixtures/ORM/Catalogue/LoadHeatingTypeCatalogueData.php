<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeatingTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadHeatingTypeCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    function load(ObjectManager $manager)
    {
        $catalogues = array(
            new HeatingTypeCatalogue('catalogue.heating_type.natural_gas'),
            new HeatingTypeCatalogue('catalogue.heating_type.electric'),
            new HeatingTypeCatalogue('catalogue.heating_type.propane'),
            new HeatingTypeCatalogue('catalogue.heating_type.gasoil'),
            new HeatingTypeCatalogue('catalogue.heating_type.radiant_wire'),
            new HeatingTypeCatalogue('catalogue.heating_type.carbon'),
            new HeatingTypeCatalogue('catalogue.heating_type.night_rate'),
            new HeatingTypeCatalogue('catalogue.heating_type.heat_pump'),
            new HeatingTypeCatalogue('catalogue.heating_type.preinstallation'),
            new HeatingTypeCatalogue('catalogue.heating_type.gas_point'),
            new HeatingTypeCatalogue('catalogue.heating_type.butane'),
            new HeatingTypeCatalogue('catalogue.heating_type.other'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
