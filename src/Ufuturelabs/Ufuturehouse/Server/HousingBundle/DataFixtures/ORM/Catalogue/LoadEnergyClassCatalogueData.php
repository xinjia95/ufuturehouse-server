<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\EnergyClassCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadEnergyCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    function load(ObjectManager $manager)
    {
        $catalogues = array(
            new EnergyClassCatalogue('catalogue.energy_class.pending'),
            new EnergyClassCatalogue('catalogue.energy_class.a_plus'),
            new EnergyClassCatalogue('catalogue.energy_class.a'),
            new EnergyClassCatalogue('catalogue.energy_class.b'),
            new EnergyClassCatalogue('catalogue.energy_class.c'),
            new EnergyClassCatalogue('catalogue.energy_class.d'),
            new EnergyClassCatalogue('catalogue.energy_class.e'),
            new EnergyClassCatalogue('catalogue.energy_class.f'),
            new EnergyClassCatalogue('catalogue.energy_class.g'),
            new EnergyClassCatalogue('catalogue.energy_class.exempt'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
