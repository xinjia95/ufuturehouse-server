<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeightCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;

class LoadHeightCatalogueData implements FixtureInterface
{
    /** {@inheritDoc} */
    function load(ObjectManager $manager)
    {
        $catalogues = array(
            new HeightCatalogue('catalogue.height.main'),
            new HeightCatalogue('catalogue.height.mezzanine'),
            new HeightCatalogue('catalogue.height.basement'),
            new HeightCatalogue('catalogue.height.subbasement_semibasement'),
            new HeightCatalogue('catalogue.height.firts_floor'),
        );

        for ($i = 1; $i < 56; $i++)
        {
            $catalogues[] = new HeightCatalogue($i);
        }

        CatalogueUtil::createCatalogues($catalogues, $manager);

        $manager->flush();
    }
}
