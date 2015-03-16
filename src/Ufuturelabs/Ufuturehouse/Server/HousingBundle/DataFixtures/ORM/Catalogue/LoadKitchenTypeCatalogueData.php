<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\KitchenTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadKitchenTypeCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    public function load(ObjectManager $manager)
    {
        $catalogues = array(
            new KitchenTypeCatalogue('catalogue.kitchen_type.independent'),
            new KitchenTypeCatalogue('catalogue.kitchen_type.small'),
            new KitchenTypeCatalogue('catalogue.kitchen_type.office'),
            new KitchenTypeCatalogue('catalogue.kitchen_type.corner'),
            new KitchenTypeCatalogue('catalogue.kitchen_type.view'),
            new KitchenTypeCatalogue('catalogue.kitchen_type.semi_independent'),
        );

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
