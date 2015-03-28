<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeatingDistributionCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadHeatingDistributionCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    public function load(ObjectManager $manager)
    {
        $catalogues = array(
            new HeatingDistributionCatalogue('catalogue.heating_distribution.central'),
            new HeatingDistributionCatalogue('catalogue.heating_distribution.individual'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
