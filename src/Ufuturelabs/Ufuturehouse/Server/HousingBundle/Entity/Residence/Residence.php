<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence;

use Doctrine\ORM\Mapping AS ORM;

use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;

/**
 * Vivienda
 *
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence
 * @since 1.0
 *
 * @ORM\Entity
 * @ORM\Table(name="residences")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "horizontal"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\ResidenceHorizontal",
 *      "vertical"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\ResidenceVertical",
 * })
 */
class Residence extends Housing
{
    /**
     * @var int Número de dormitorios
     *
     * @ORM\Column(name="bedrooms_number", type="integer", nullable=false)
     */
    private $bedroomsNumber = 0;

    /**
     * @var int Número de baños
     *
     * @ORM\Column(name="bathrooms_number", type="integer", nullable=false)
     */
    private $bathroomsNumber = 0;

    /**
     * @var int Número de aseos
     *
     * @ORM\Column(name="toilets_number", type="integer", nullable=false)
     */
    private $toiletsNumber = 0;

    /**
     * @var int Número de salones
     *
     * @ORM\Column(name="sittingrooms_number", type="integer", nullable=false)
     */
    private $sittingroomsNumber = 0;

    /**
     * @var int Número de cocinas
     *
     * @ORM\Column(name="kitchens_number", type="integer", nullable=false)
     */
    private $kitchensNumber = 0;

    /**
     * @var int Número de terrazas
     *
     * @ORM\Column(name="terraces_number", type="integer", nullable=false)
     */
    private $terracesNumber = 0;

    /**
     * @var int Número de balcones
     *
     * @ORM\Column(name="balconies_number", type="integer", nullable=false)
     */
    private $balconiesNumber = 0;

    /**
     * @var int Número de plazas de garaje
     *
     * @ORM\Column(name="parking_spaces_number", type="integer", nullable=false)
     */
    private $parkingSpacesNumber = 0;

    /**
     * @var float Superficie de salones
     *
     * @ORM\Column(name="sittingrooms_area", type="float", precision=10, scale=2, nullable=false)
     */
    private $sittingroomsArea = 0.00;

    /**
     * @var float Superficie de cocinas
     *
     * @ORM\Column(name="kitchens_area", type="float", precision=10, scale=2, nullable=false)
     */
    private $kitchensArea = 0.00;

    /**
     * @var float Superficie de terrazas
     *
     * @ORM\Column(name="terraces_area", type="float", precision=10, scale=2, nullable=false)
     */
    private $terracesArea = 0.00;

    /**
     * @var float Superficie de balcones
     *
     *
     * @ORM\Column(name="balconies_area", type="float", precision=5, scale=2, nullable=false)
     */
    private $balconiesArea = 0.00;

    /**
     * @var float Superficie de plazas de garaje
     *
     * @ORM\Column(name="parking_spaces_area", type="float", precision=6, scale=2, nullable=false)
     */
    private $parkingSpacesArea = 0.00;

    /**
     * @var string Tipo de cocina
     *
     * Los valores posibles se obtienen del catálogo "kitchen-type".
     *
     * @ORM\Column(name="kitchen_type", type="string", length=100, nullable=true)
     */
    private $kitchenType;

    /**
     * @var string Tipo de plazas de garaje
     *
     * Los valores posibles se obtienen del catálogo "parking-space-type".
     *
     * @ORM\Column(name="parking_space_type", type="string", length=100, nullable=true)
     */
    private $parkingSpaceType;

    /**
     * @var float Altura del edificio
     *
     * @ORM\Column(name="height", type="float", precision=5, scale=2, nullable=true)
     */
    private $height;

    /**
     * @var boolean Indica si el precio de las plazas de garaje está incluido en el precio de la vivienda
     *
     * @ORM\Column(name="pvp_parking_spaces_included", type="boolean", nullable=false)
     */
    private $parkingSpacesPriceIncluded = false;

    /**
     * @var float Precio de las plazas de garaje por separado de la vivienda
     *
     * @ORM\Column(name="parking_spaces_price", type="float", precision=10, scale=2, nullable="true")
     */
    private $parkingSpacesPrice;

    /**
     * @var string Tipo de construcción
     *
     * Los valores posibles se obtienen del catálogo "building-type".
     *
     * @ORM\Column(name="building_type", type="string", length=100, nullable=true)
     */
    private $buildingType;

    /**
     * @var string Tipo de agua caliente
     *
     * Los valores posibles se obtienen del catálogo "hot-water-type".
     *
     * @ORM\Column(name="hot_water_type", type="string", length=100, nullable=true)
     */
    private $hotWaterType;

    /**
     * @var string Tipo de aire acondicionado
     *
     * Los valores posibles se obtienen del catálogo "air-conditioning-type".
     *
     * @ORM\Column(name="air_conditioning_type", type="string", length=100, nullable=true)
     */
    private $airConditioningType;

    /**
     * @var string Amueblado
     *
     * Descripción de los muebles
     *
     * @ORM\Column(name="furnished", type="string", length=255, nullable=true)
     */
    private $furnished;

    /**
     * @var int Número de armarios empotrados
     *
     * @ORM\Column(name="wardrobes_number", type="integer", nullable=false)
     */
    private $wardrobesNumber;

    /**
     * @var boolean Vestidor
     *
     * @ORM\Column(name="dresser", type="boolean", nullable=false)
     */
    private $dresser;

    /**
     * @var boolean Trastero
     *
     * @ORM\Column(name="boxroom", type="boolean", nullable=false)
     */
    private $boxroom;

    /**
     * @var boolean Piscina
     *
     * @ORM\Column(name="swimming_pool", type="boolean", nullable=false)
     */
    private $swimmingPool;

    /**
     * @var string Tipo de jardín
     *
     * Los valores posibles se obtienen del catálogo "garden-type".
     *
     * @ORM\Column(name="garden_type", type="string", length=100, nullable=true)
     */
    private $gardenType;

    /**
     * @return string
     */
    public function getAirConditioningType()
    {
        return $this->airConditioningType;
    }

    /**
     * @param string $airConditioningType
     */
    public function setAirConditioningType($airConditioningType)
    {
        $this->airConditioningType = $airConditioningType;
    }

    /**
     * @return float
     */
    public function getBalconiesArea()
    {
        return $this->balconiesArea;
    }

    /**
     * @param float $balconiesArea
     */
    public function setBalconiesArea($balconiesArea)
    {
        $this->balconiesArea = $balconiesArea;
    }

    /**
     * @return int
     */
    public function getBalconiesNumber()
    {
        return $this->balconiesNumber;
    }

    /**
     * @param int $balconiesNumber
     */
    public function setBalconiesNumber($balconiesNumber)
    {
        $this->balconiesNumber = $balconiesNumber;
    }

    /**
     * @return int
     */
    public function getBathroomsNumber()
    {
        return $this->bathroomsNumber;
    }

    /**
     * @param int $bathroomsNumber
     */
    public function setBathroomsNumber($bathroomsNumber)
    {
        $this->bathroomsNumber = $bathroomsNumber;
    }

    /**
     * @return int
     */
    public function getBedroomsNumber()
    {
        return $this->bedroomsNumber;
    }

    /**
     * @param int $bedroomsNumber
     */
    public function setBedroomsNumber($bedroomsNumber)
    {
        $this->bedroomsNumber = $bedroomsNumber;
    }

    /**
     * @return boolean
     */
    public function isBoxroom()
    {
        return $this->boxroom;
    }

    /**
     * @param boolean $boxroom
     */
    public function setBoxroom($boxroom)
    {
        $this->boxroom = $boxroom;
    }

    /**
     * @return string
     */
    public function getBuildingType()
    {
        return $this->buildingType;
    }

    /**
     * @param string $buildingType
     */
    public function setBuildingType($buildingType)
    {
        $this->buildingType = $buildingType;
    }

    /**
     * @return boolean
     */
    public function isDresser()
    {
        return $this->dresser;
    }

    /**
     * @param boolean $dresser
     */
    public function setDresser($dresser)
    {
        $this->dresser = $dresser;
    }

    /**
     * @return string
     */
    public function getFurnished()
    {
        return $this->furnished;
    }

    /**
     * @param string $furnished
     */
    public function setFurnished($furnished)
    {
        $this->furnished = $furnished;
    }

    /**
     * @return string
     */
    public function getGardenType()
    {
        return $this->gardenType;
    }

    /**
     * @param string $gardenType
     */
    public function setGardenType($gardenType)
    {
        $this->gardenType = $gardenType;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getHotWaterType()
    {
        return $this->hotWaterType;
    }

    /**
     * @param string $hotWaterType
     */
    public function setHotWaterType($hotWaterType)
    {
        $this->hotWaterType = $hotWaterType;
    }

    /**
     * @return string
     */
    public function getKitchenType()
    {
        return $this->kitchenType;
    }

    /**
     * @param string $kitchenType
     */
    public function setKitchenType($kitchenType)
    {
        $this->kitchenType = $kitchenType;
    }

    /**
     * @return float
     */
    public function getKitchensArea()
    {
        return $this->kitchensArea;
    }

    /**
     * @param float $kitchensArea
     */
    public function setKitchensArea($kitchensArea)
    {
        $this->kitchensArea = $kitchensArea;
    }

    /**
     * @return int
     */
    public function getKitchensNumber()
    {
        return $this->kitchensNumber;
    }

    /**
     * @param int $kitchensNumber
     */
    public function setKitchensNumber($kitchensNumber)
    {
        $this->kitchensNumber = $kitchensNumber;
    }

    /**
     * @return string
     */
    public function getParkingSpaceType()
    {
        return $this->parkingSpaceType;
    }

    /**
     * @param string $parkingSpaceType
     */
    public function setParkingSpaceType($parkingSpaceType)
    {
        $this->parkingSpaceType = $parkingSpaceType;
    }

    /**
     * @return float
     */
    public function getParkingSpacesArea()
    {
        return $this->parkingSpacesArea;
    }

    /**
     * @param float $parkingSpacesArea
     */
    public function setParkingSpacesArea($parkingSpacesArea)
    {
        $this->parkingSpacesArea = $parkingSpacesArea;
    }

    /**
     * @return int
     */
    public function getParkingSpacesNumber()
    {
        return $this->parkingSpacesNumber;
    }

    /**
     * @param int $parkingSpacesNumber
     */
    public function setParkingSpacesNumber($parkingSpacesNumber)
    {
        $this->parkingSpacesNumber = $parkingSpacesNumber;
    }

    /**
     * @return float
     */
    public function getParkingSpacesPrice()
    {
        return $this->parkingSpacesPrice;
    }

    /**
     * @param float $parkingSpacesPrice
     */
    public function setParkingSpacesPrice($parkingSpacesPrice)
    {
        $this->parkingSpacesPrice = $parkingSpacesPrice;
    }

    /**
     * @return boolean
     */
    public function isParkingSpacesPriceIncluded()
    {
        return $this->parkingSpacesPriceIncluded;
    }

    /**
     * @param boolean $parkingSpacesPriceIncluded
     */
    public function setParkingSpacesPriceIncluded($parkingSpacesPriceIncluded)
    {
        $this->parkingSpacesPriceIncluded = $parkingSpacesPriceIncluded;
    }

    /**
     * @return float
     */
    public function getSittingroomsArea()
    {
        return $this->sittingroomsArea;
    }

    /**
     * @param float $sittingroomsArea
     */
    public function setSittingroomsArea($sittingroomsArea)
    {
        $this->sittingroomsArea = $sittingroomsArea;
    }

    /**
     * @return int
     */
    public function getSittingroomsNumber()
    {
        return $this->sittingroomsNumber;
    }

    /**
     * @param int $sittingroomsNumber
     */
    public function setSittingroomsNumber($sittingroomsNumber)
    {
        $this->sittingroomsNumber = $sittingroomsNumber;
    }

    /**
     * @return boolean
     */
    public function isSwimmingPool()
    {
        return $this->swimmingPool;
    }

    /**
     * @param boolean $swimmingPool
     */
    public function setSwimmingPool($swimmingPool)
    {
        $this->swimmingPool = $swimmingPool;
    }

    /**
     * @return float
     */
    public function getTerracesArea()
    {
        return $this->terracesArea;
    }

    /**
     * @param float $terracesArea
     */
    public function setTerracesArea($terracesArea)
    {
        $this->terracesArea = $terracesArea;
    }

    /**
     * @return int
     */
    public function getTerracesNumber()
    {
        return $this->terracesNumber;
    }

    /**
     * @param int $terracesNumber
     */
    public function setTerracesNumber($terracesNumber)
    {
        $this->terracesNumber = $terracesNumber;
    }

    /**
     * @return int
     */
    public function getToiletsNumber()
    {
        return $this->toiletsNumber;
    }

    /**
     * @param int $toiletsNumber
     */
    public function setToiletsNumber($toiletsNumber)
    {
        $this->toiletsNumber = $toiletsNumber;
    }

    /**
     * @return int
     */
    public function getWardrobesNumber()
    {
        return $this->wardrobesNumber;
    }

    /**
     * @param int $wardrobesNumber
     */
    public function setWardrobesNumber($wardrobesNumber)
    {
        $this->wardrobesNumber = $wardrobesNumber;
    }
}