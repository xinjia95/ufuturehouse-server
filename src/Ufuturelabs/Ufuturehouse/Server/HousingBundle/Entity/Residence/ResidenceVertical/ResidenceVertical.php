<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical;

use Doctrine\ORM\Mapping AS ORM;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ClothesLineCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\DoorwayStateCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\DoorwayStatusCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeightCatalogue;
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
     * @var HeightCatalogue
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeightCatalogue")
     * @ORM\JoinColumn(name="height_id", referencedColumnName="id", nullable=true)
     */
    private $height;

    /**
     * @var DoorwayStatusCatalogue Estado del portal
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\DoorwayStatusCatalogue")
     * @ORM\JoinColumn(name="doorway_status_id", referencedColumnName="id", nullable=true)
     */
    private $doorwayStatus;

    /**
     * @var int Número de ascensores
     *
     * @ORM\Column(name="elevator_number", type="integer", nullable=true)
     */
    private $elevatorNumber;

    /**
     * @var ClothesLineCatalogue Tendedero
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ClothesLineCatalogue")
     * @ORM\JoinColumn(name="clothes_line_id", referencedColumnName="id", nullable=true)
     */
    private $clothesLine;

    /**
     * @var boolean Conserje
     *
     * @ORM\Column(name="concierge", type="boolean", nullable=false)
     */
    private $concierge = false;

    /**
     * @return HeightCatalogue
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param HeightCatalogue $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return DoorwayStatusCatalogue
     */
    public function getDoorwayStatus()
    {
        return $this->doorwayStatus;
    }

    /**
     * @param DoorwayStatusCatalogue $doorwayStatus
     */
    public function setDoorwayStatus($doorwayStatus)
    {
        $this->doorwayStatus = $doorwayStatus;
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
     * @return ClothesLineCatalogue
     */
    public function getClothesLine()
    {
        return $this->clothesLine;
    }

    /**
     * @param ClothesLineCatalogue $clothesLine
     */
    public function setClothesLine($clothesLine)
    {
        $this->clothesLine = $clothesLine;
    }

    /**
     * @return boolean
     */
    public function isConcierge()
    {
        return $this->concierge;
    }

    /**
     * @param boolean $concierge
     */
    public function setConcierge($concierge)
    {
        $this->concierge = $concierge;
    }
}
