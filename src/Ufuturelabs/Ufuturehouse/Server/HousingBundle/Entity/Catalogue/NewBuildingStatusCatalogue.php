<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class NewBuildingStatusCatalogue extends Catalogue
{
    /** @param string|null $value */
    public function __construct($value = null)
    {
        parent::__construct($value);
    }
}
