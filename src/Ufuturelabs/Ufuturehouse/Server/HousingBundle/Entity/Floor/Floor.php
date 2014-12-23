<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor;

use Doctrine\ORM\Mapping AS ORM;

use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;

/**
 * Suelo
 *
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor
 * @since 1.0
 *
 * @ORM\Entity
 * @ORM\Table(name="floors")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "non_urban_floor"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor\NonUrbanFloor",
 *      "urban_floor"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor\UrbanFloor",
 * })
 */
class Floor extends Housing
{
}