<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class EnergyClassCatalogue
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue
 *
 * @ORM\Entity()
 */
class EnergyClassCatalogue extends Catalogue
{
    /** @param string|null $value */
    public function __construct($value = null)
    {
        parent::__construct($value);
    }
}
