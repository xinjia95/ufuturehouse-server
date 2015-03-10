<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal;

use Doctrine\ORM\Mapping AS ORM;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\Residence;

/**
 * Class ResidenceHorizontal
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal
 *
 * @ORM\Entity
 * @ORM\Table(name="housings_residences_horizontal")
 */
abstract class ResidenceHorizontal extends Residence
{
}