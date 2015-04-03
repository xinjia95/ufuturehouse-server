<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Catalogue
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue
 *
 * @ORM\Entity()
 * @ORM\Table(name="housings_catalogues")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "air_conditioning_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\AirConditioningTypeCatalogue",
 *      "building_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\BuildingTypeCatalogue",
 *      "clothes_line"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ClothesLineCatalogue",
 *      "conservation_status"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ConservationStatusCatalogue",
 *      "doorway_status"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\DoorwayStatusCatalogue",
 *      "emissions_class"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\EmissionsClassCatalogue",
 *      "energy_class"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\EnergyClassCatalogue",
 *      "furnished"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\FurnishedCatalogue",
 *      "garden_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\GardenTypeCatalogue",
 *      "heating_distribution"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeatingDistributionCatalogue",
 *      "heating_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeatingTypeCatalogue",
 *      "hot_water_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HotWaterTypeCatalogue",
 *      "housing_category"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HousingCategoryCatalogue",
 *      "height"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeightCatalogue",
 *      "kitchen_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\KitchenTypeCatalogue",
 *      "new_building_status"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\NewBuildingStatusCatalogue",
 *      "orientation"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\OrientationCatalogue",
 *      "parking_space_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ParkingSpaceTypeCatalogue"
 * })
 */
abstract class Catalogue
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=false)
     */
    private $value;

    /** @param string|null $value */
    public function __construct($value = null)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
