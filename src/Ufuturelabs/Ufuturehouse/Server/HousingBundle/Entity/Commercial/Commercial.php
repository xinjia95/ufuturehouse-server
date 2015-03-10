<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial;

use Doctrine\ORM\Mapping AS ORM;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;

/**
 * Class Commercial
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial
 *
 * @ORM\Entity
 * @ORM\Table(name="housings_commercials")
 */
abstract class Commercial extends Housing
{
}
