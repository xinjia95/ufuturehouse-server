<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class HeatingTypeCatalogue
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue
 *
 * @ORM\Entity()
 */
class HeatingTypeCatalogue extends Catalogue
{
    /** @param string|null $value */
    public function __construct($value = null)
    {
        parent::__construct($value);
    }
}
