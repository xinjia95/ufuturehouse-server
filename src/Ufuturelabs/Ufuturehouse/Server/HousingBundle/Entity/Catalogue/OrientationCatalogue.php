<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue;

use Doctrine\ORM\Mapping AS ORM;

/**
 * Class OrientationCatalogue
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue
 *
 * @ORM\Entity()
 */
class OrientationCatalogue extends Catalogue
{
    /** @param string|null $value */
    public function __construct($value = null)
    {
        parent::__construct($value);
    }
}
