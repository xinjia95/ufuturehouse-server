<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ConservationStatusCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadConservationStatusCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    function load(ObjectManager $manager)
    {
        $catalogues = array(
            new ConservationStatusCatalogue('catalogue.conservation_status.first_time'),
            new ConservationStatusCatalogue('catalogue.conservation_status.perfect'),
            new ConservationStatusCatalogue('catalogue.conservation_status.good'),
            new ConservationStatusCatalogue('catalogue.conservation_status.renovate'),
            new ConservationStatusCatalogue('catalogue.conservation_status.remodel'),
            new ConservationStatusCatalogue('catalogue.conservation_status.semiremodel'),
            new ConservationStatusCatalogue('catalogue.conservation_status.to_remodel'),
            new ConservationStatusCatalogue('catalogue.conservation_status.in_rough'),
            new ConservationStatusCatalogue('catalogue.conservation_status.origin'),
            new ConservationStatusCatalogue('catalogue.conservation_status.on_building'),
            new ConservationStatusCatalogue('catalogue.conservation_status.on_proyecto'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
