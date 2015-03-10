<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical;

use Doctrine\ORM\Mapping AS ORM;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\Residence;

/**
 * Class ResidenceVertical
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical
 *
 * @ORM\Entity
 * @ORM\Table(name="housings_residences_vertical")
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
     * @return string
     */
    public function getClothesLine()
    {
        return $this->clothesLine;
    }

    /**
     * @param string $clothesLine
     */
    public function setClothesLine($clothesLine)
    {
        $this->clothesLine = $clothesLine;
    }
}
