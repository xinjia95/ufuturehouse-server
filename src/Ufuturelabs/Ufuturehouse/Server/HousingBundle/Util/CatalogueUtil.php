<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;

class CatalogueUtil
{
    /**
     * @param array $catalogues
     * @param ObjectManager $manager
     * @throws ParameterNotFoundException
     */
    public static function createCatalogues(array $catalogues, ObjectManager $manager)
    {
        if (is_null($manager))
        {
            throw new ParameterNotFoundException('Entity manager missing');
        }

        foreach ($catalogues as $catalogue)
        {
            $manager->persist($catalogue);
        }
    }
}
