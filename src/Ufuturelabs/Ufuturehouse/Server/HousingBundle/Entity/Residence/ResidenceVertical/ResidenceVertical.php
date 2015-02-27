<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical;

use Doctrine\ORM\Mapping AS ORM;

use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\Residence;

/**
 * Residencia vertical
 *
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical
 * @since 1.0
 *
 * @ORM\Entity
 * @ORM\Table(name="residences_vertical")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "flat"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Flat",
 *      "apartment"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Apartment",
 *      "study"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Study",
 *      "penthouse"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Penthouse",
 *      "firts_floor"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\FirstFloor",
 *      "duplex"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Duplex",
 *      "attic"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Attic",
 *      "penthouse_duplex"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\PenthouseDuplex",
 *      "loft"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Loft",
 * })
 */
abstract class ResidenceVertical extends Residence
{
    /**
     * @var string Estado del portal
     *
     * @ORM\Column(name="doorway_state", type="string", length=30, nullable=true)
     */
    private $doorwayState;

    /**
     * @var int Número de ascensores
     *
     * @ORM\Column(name="elevator_number", type="integer")
     */
    private $elevatorNumber = 0;

    /**
     * @var string Tendedero
     *
     * @ORM\Column(name="clothes_line", type="string", length=30, nullable=true)
     */
    private $clothesLine;

    /**
     * @return string
     */
    public function getDoorwayState()
    {
        return $this->doorwayState;
    }

    /**
     * @param string $doorwayState
     */
    public function setDoorwayState($doorwayState)
    {
        $this->doorwayState = $doorwayState;
    }

    /**
     * @return int
     */
    public function getElevatorNumber()
    {
        return $this->elevatorNumber;
    }

    /**
     * @param int $elevatorNumber
     */
    public function setElevatorNumber($elevatorNumber)
    {
        $this->elevatorNumber = $elevatorNumber;
    }

    /**
     * @return mixed
     */
    public function getClothesLine()
    {
        return $this->clothesLine;
    }

    /**
     * @param mixed $clothesLine
     */
    public function setClothesLine($clothesLine)
    {
        $this->clothesLine = $clothesLine;
    }
}
