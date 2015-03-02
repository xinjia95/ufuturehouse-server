<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal;

use Doctrine\ORM\Mapping AS ORM;

use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\Residence;

/**
 * Residencia horizontal
 *
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal
 * @since 1.0
 *
 * @ORM\Entity
 * @ORM\Table(name="housings_residences_horizontal")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap( {
 *      "detached_house"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\DetachedHouse",
 *      "townhouse"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Townhouse",
 *      "semidetached_house"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\SemidetachedHouse",
 *      "urban_development_detached_house"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\UrbanDevelopmentDetachedHouse",
 *      "villa"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Villa",
 *      "ranch"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Ranch",
 *      "tower"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Tower",
 *      "castle"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Castle",
 *      "bungalow"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Bungalow",
 *      "house"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\House",
 *      "country_house"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\CountryHouse"
 * } )
 */
abstract class ResidenceHorizontal extends Residence
{
}
