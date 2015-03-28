<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\AirConditioningTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadAirConditioningTypeCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    public function load(ObjectManager $manager)
    {
        $catalogues = array(
            new AirConditioningTypeCatalogue('catalogue.air_conditioning.yes'),
            new AirConditioningTypeCatalogue('catalogue.air_conditioning.centralize'),
            new AirConditioningTypeCatalogue('catalogue.air_conditioning.individual'),
            new AirConditioningTypeCatalogue('catalogue.air_conditioning.combined'),
            new AirConditioningTypeCatalogue('catalogue.air_conditioning.preinstalled'),
            new AirConditioningTypeCatalogue('catalogue.air_conditioning.heat_cold'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
