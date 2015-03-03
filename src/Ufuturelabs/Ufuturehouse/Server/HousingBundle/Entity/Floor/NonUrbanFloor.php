<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor;

use Doctrine\ORM\Mapping AS ORM;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;

/**
 * Suelo no urbano
 *
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor
 * @since 1.0
 *
 * @ORM\Entity
 * @ORM\Table(name="housings_non_urbans_floors")
 */
class NonUrbanFloor extends Housing
{
}
