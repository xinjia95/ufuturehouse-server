<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor;

use Doctrine\ORM\Mapping AS ORM;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;

/**
 * Class Floor
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor
 *
 * @ORM\Entity
 * @ORM\Table(name="housings_floors")
 */
abstract class Floor extends Housing
{
}
