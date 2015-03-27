<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence;

use Doctrine\ORM\Mapping AS ORM;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\AirConditioningTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\BuildingTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\EmissionsClassCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\EnergyClassCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\FurnishedCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\GardenTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeatingDistributionCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeatingTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HotWaterTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HousingCategoryCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\KitchenTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ParkingSpaceTypeCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;

/**
 * Class Residence
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence
 *
 * @ORM\Entity
 * @ORM\Table(name="housings_residences")
 */
abstract class Residence extends Housing
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
     * @var KitchenTypeCatalogue Tipo de cocina
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\KitchenTypeCatalogue")
     * @ORM\JoinColumn(name="kitchen_type_id", referencedColumnName="id", nullable=true)
     */
    private $kitchenType;

    /**
     * @var ParkingSpaceTypeCatalogue Tipo de plazas de garaje
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ParkingSpaceTypeCatalogue")
     * @ORM\JoinColumn(name="parking_space_type_id", referencedColumnName="id", nullable=true)
     */
    private $parkingSpaceType;

    /**
     * @var boolean Indica si el precio de las plazas de garaje está incluido en el precio de la vivienda
     *
     * @ORM\Column(name="pvp_parking_spaces_included", type="boolean", nullable=false)
     */
    private $parkingSpacesPriceIncluded = false;

    /**
     * @var float Precio de las plazas de garaje por separado de la vivienda
     *
     * @ORM\Column(name="parking_spaces_price", type="float", precision=10, scale=2, nullable=true)
     */
    private $parkingSpacesPrice;

    /**
     * @var BuildingTypeCatalogue Tipo de construcción
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\BuildingTypeCatalogue")
     * @ORM\JoinColumn(name="building_type_id", referencedColumnName="id", nullable=true)
     */
    private $buildingType;

    /**
     * @var HotWaterTypeCatalogue Tipo de agua caliente
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HotWaterTypeCatalogue")
     * @ORM\JoinColumn(name="hot_water_type_id", referencedColumnName="id", nullable=true)
     */
    private $hotWaterType;

    /**
     * @var AirConditioningTypeCatalogue Tipo de aire acondicionado
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\AirConditioningTypeCatalogue")
     * @ORM\JoinColumn(name="air_conditioning_type_id", referencedColumnName="id", nullable=true)
     */
    private $airConditioningType;

    /**
     * @var FurnishedCatalogue Amueblado
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\FurnishedCatalogue")
     * @ORM\JoinColumn(name="air_conditioning_type_id", referencedColumnName="id", nullable=true)
     */
    private $furnished;

    /**
     * @var int Número de armarios empotrados
     *
     * @ORM\Column(name="wardrobes_number", type="integer", nullable=false)
     */
    private $wardrobesNumber = 0;

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
     * @var GardenTypeCatalogue Tipo de jardín
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\GardenTypeCatalogue")
     * @ORM\JoinColumn(name="garden_type_id", referencedColumnName="id", nullable=true)
     */
    private $gardenType;

    /**
     * @var HousingCategoryCatalogue Calificación
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HousingCategoryCatalogue")
     * @ORM\JoinColumn(name="housing_type_id", referencedColumnName="id", nullable=true)
     */
    private $category;

    /**
     * @var EnergyClassCatalogue Clase energética
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\EnergyClassCatalogue")
     * @ORM\JoinColumn(name="energy_class_id", referencedColumnName="id", nullable=false)
     */
    private $energyClass;

    /**
     * @var float Índice de consumo energético medido en kWh/m2 año
     *
     * @ORM\Column(name="consumption_rate", type="float", nullable=true)
     */
    private $consumptionRate;

    /**
     * @var EmissionsClassCatalogue Clase de emisiones
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\EmissionsClassCatalogue")
     * @ORM\JoinColumn(name="emissions_class_id", referencedColumnName="id", nullable=false)
     */
    private $emissionsClass;

    /**
     * @var float Índice de emisiones medido en kg CO2/m2 año
     *
     * @ORM\Column(name="emissions_rate", type="float", nullable=true)
     */
    private $emissionsRate;

    /**
     * @var HeatingDistributionCatalogue Tipo distribución calefacción
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeatingDistributionCatalogue")
     * @ORM\JoinColumn(name="heating_distribution_id", referencedColumnName="id", nullable=false)
     */
    private $heatingDistribution;

    /**
     * @var HeatingTypeCatalogue Tipo calefacción
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeatingTypeCatalogue")
     * @ORM\JoinColumn(name="heating_type_id", referencedColumnName="id", nullable=false)
     */
    private $heatingType;

    /**
     * @var boolean Puerta de seguridad
     *
     * @ORM\Column(name="security_door", type="boolean", nullable=false)
     */
    private $securityDoor = false;

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
     * @return KitchenTypeCatalogue
     */
    public function getKitchenType()
    {
        return $this->kitchenType;
    }

    /**
     * @param KitchenTypeCatalogue $kitchenType
     */
    public function setKitchenType($kitchenType)
    {
        $this->kitchenType = $kitchenType;
    }

    /**
     * @return ParkingSpaceTypeCatalogue
     */
    public function getParkingSpaceType()
    {
        return $this->parkingSpaceType;
    }

    /**
     * @param ParkingSpaceTypeCatalogue $parkingSpaceType
     */
    public function setParkingSpaceType($parkingSpaceType)
    {
        $this->parkingSpaceType = $parkingSpaceType;
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
     * @return BuildingTypeCatalogue
     */
    public function getBuildingType()
    {
        return $this->buildingType;
    }

    /**
     * @param BuildingTypeCatalogue $buildingType
     */
    public function setBuildingType($buildingType)
    {
        $this->buildingType = $buildingType;
    }

    /**
     * @return HotWaterTypeCatalogue
     */
    public function getHotWaterType()
    {
        return $this->hotWaterType;
    }

    /**
     * @param HotWaterTypeCatalogue $hotWaterType
     */
    public function setHotWaterType($hotWaterType)
    {
        $this->hotWaterType = $hotWaterType;
    }

    /**
     * @return AirConditioningTypeCatalogue
     */
    public function getAirConditioningType()
    {
        return $this->airConditioningType;
    }

    /**
     * @param AirConditioningTypeCatalogue $airConditioningType
     */
    public function setAirConditioningType($airConditioningType)
    {
        $this->airConditioningType = $airConditioningType;
    }

    /**
     * @return FurnishedCatalogue
     */
    public function getFurnished()
    {
        return $this->furnished;
    }

    /**
     * @param FurnishedCatalogue $furnished
     */
    public function setFurnished($furnished)
    {
        $this->furnished = $furnished;
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
     * @return GardenTypeCatalogue
     */
    public function getGardenType()
    {
        return $this->gardenType;
    }

    /**
     * @param GardenTypeCatalogue $gardenType
     */
    public function setGardenType($gardenType)
    {
        $this->gardenType = $gardenType;
    }

    /**
     * @return HousingCategoryCatalogue
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param HousingCategoryCatalogue $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return EnergyClassCatalogue
     */
    public function getEnergyClass()
    {
        return $this->energyClass;
    }

    /**
     * @param EnergyClassCatalogue $energyClass
     */
    public function setEnergyClass($energyClass)
    {
        $this->energyClass = $energyClass;
    }

    /**
     * @return float
     */
    public function getConsumptionRate()
    {
        return $this->consumptionRate;
    }

    /**
     * @param float $consumptionRate
     */
    public function setConsumptionRate($consumptionRate)
    {
        $this->consumptionRate = $consumptionRate;
    }

    /**
     * @return EmissionsClassCatalogue
     */
    public function getEmissionsClass()
    {
        return $this->emissionsClass;
    }

    /**
     * @param EmissionsClassCatalogue $emissionsClass
     */
    public function setEmissionsClass($emissionsClass)
    {
        $this->emissionsClass = $emissionsClass;
    }

    /**
     * @return float
     */
    public function getEmissionsRate()
    {
        return $this->emissionsRate;
    }

    /**
     * @param float $emissionsRate
     */
    public function setEmissionsRate($emissionsRate)
    {
        $this->emissionsRate = $emissionsRate;
    }

    /**
     * @return HeatingDistributionCatalogue
     */
    public function getHeatingDistribution()
    {
        return $this->heatingDistribution;
    }

    /**
     * @param HeatingDistributionCatalogue $heatingDistribution
     */
    public function setHeatingDistribution($heatingDistribution)
    {
        $this->heatingDistribution = $heatingDistribution;
    }

    /**
     * @return HeatingTypeCatalogue
     */
    public function getHeatingType()
    {
        return $this->heatingType;
    }

    /**
     * @param HeatingTypeCatalogue $heatingType
     */
    public function setHeatingType($heatingType)
    {
        $this->heatingType = $heatingType;
    }

    /**
     * @return boolean
     */
    public function isSecurityDoor()
    {
        return $this->securityDoor;
    }

    /**
     * @param boolean $securityDoor
     */
    public function setSecurityDoor($securityDoor)
    {
        $this->securityDoor = $securityDoor;
    }
}
