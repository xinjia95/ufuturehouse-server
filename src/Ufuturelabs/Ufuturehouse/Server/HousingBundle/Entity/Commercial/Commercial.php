<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial;

use Doctrine\ORM\Mapping AS ORM;

use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;

/**
 * Comercial
 *
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial
 * @since 1.0
 *
 * @ORM\Entity
 * @ORM\Table(name="commercials")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "commercial_property"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial\CommercialProperty",
 *      "storehouse"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial\Storehouse",
 *      "archive"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial\Archive",
 * })
 */
class Commercial extends Housing
{
}