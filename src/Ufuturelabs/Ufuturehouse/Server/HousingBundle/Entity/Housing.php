<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Util\Util;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ConservationStatusCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\NewBuildingStatusCatalogue;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\OrientationCatalogue;

/**
 * Inmueble
 *
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity
 * @since 1.0
 *
 * @ORM\Entity(repositoryClass="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\HousingRepository")
 * @ORM\Table(name="housings")
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
 *      "country_house"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\CountryHouse",
 *      "office"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Office",
 *      "commercial_property"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial\CommercialProperty",
 *      "storehouse"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial\Storehouse",
 *      "archive"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial\Archive",
 *      "warehouse"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Warehouse",
 *      "garage"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Garage",
 *      "storage"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Storage",
 *      "non_urban_floor"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor\NonUrbanFloor",
 *      "urban_floor"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor\UrbanFloor",
 * })
 */
class Housing
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
     * @var string Breve descripción del inmueble
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var boolean Indica si está en venta
     *
     * En caso de ser alquiler con opción a compra, $onSale y $forRent deben ser TRUE.
     *
     * @ORM\Column(name="on_sale", type="boolean", nullable=false)
     */
    private $onSale = false;

    /**
     * @var boolean Indica si está disponible para alqilar
     *
     * En caso de ser alquiler con opción a compra, $onSale y $forRent deben ser TRUE.
     *
     * @ORM\Column(name="for_rent", type="boolean", nullable=false)
     */
    private $forRent = false;

    /**
     * @var boolean Indica si ha sido vendido
     *
     * En este caso debe desaparecer del frontend
     *
     * @ORM\Column(name="sold", type="boolean", nullable=false)
     */
    private $sold = false;

    /**
     * @var boolean Indica si ha sido alquilado
     *
     * En este caso debe desaparecer del frontend
     *
     * @ORM\Column(name="rented", type="boolean", nullable=false)
     */
    private $rented = false;

    /**
     * @var ConservationStatusCatalogue Estado de conservación del inmueble
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ConservationStatusCatalogue")
     * @ORM\JoinColumn(name="conservation_status_id", referencedColumnName="id")
     */
    private $conservationStatus;

    /**
     * @var float Superficie contruida
     *
     * @ORM\Column(name="floor_area", type="float", precision=10, scale=2, nullable=true)
     */
    private $floorArea;

    /**
     * @var float Superficie alquilable
     *
     * @ORM\Column(name="rentable_area", type="float", precision=10, scale=2, nullable=true)
     */
    private $rentableArea;

    /**
     * @var float Superficie util
     *
     * @ORM\Column(name="usable_area", type="float", precision=10, scale=2, nullable=true)
     */
    private $usableArea;

    /**
     * @var string Dirección
     * No visible desde el frontend.
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string Año de construcción
     *
     * Año de construcción del inmueble.
     *
     * @ORM\Column(name="building_year", type="string", length=4, nullable=true)
     */
    private $buildingYear;

    /**
     * @var float Precio
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=2, nullable=true)
     */
    private $price;

    /**
     * @var float Precio en oferta
     *
     * @ORM\Column(name="price_offer", type="float", precision=10, scale=2, nullable=true)
     */
    private $priceOffer;

    /**
     * @var boolean Inmueble del banco
     *
     * @ORM\Column(name="bank_property", type="boolean", nullable=false)
     */
    private $bankProperty = false;

    /**
     * @var \DateTime Fecha de disponibilidad
     *
     * Fecha a partir de la cual el inmueble pasa a estar disponible. Si es NULL la disponibilidad es inmediata.
     *
     * @ORM\Column(name="availability_date", type="date", nullable=false)
     */
    private $availabilityDate;

    /**
     * @var boolean Propiedad de lujo
     *
     * @ORM\Column(name="luxury_property", type="boolean", nullable=false)
     */
    private $luxuryProperty = false;

    /**
     * @var \Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\State Provincia en la que se encuentra el inmueble
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\State")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    private $locationState;

    /**
     * @var \Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\City Localidad en la que se encuentra el inmueble
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    private $city;

    /**
     * @var \Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Zone Zona de la localidad en la que se encuentra el inmueble
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Zone")
     * @ORM\JoinColumn(name="zone_id", referencedColumnName="id")
     */
    private $zone;

    /**
     * @var OrientationCatalogue Orientación geográfica del imnueble
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\OrientationCatalogue")
     * @ORM\JoinColumn(name="orientation_id", referencedColumnName="id", nullable=true)
     */
    private $orientation;

    /**
     * @var boolean Indica si el inmueble da al exterior
     *
     * @ORM\Column(name="outside", type="boolean", nullable=false)
     */
    private $outside = false;

    /**
     * @var boolean Indica si el inmueble da al interior
     *
     * @ORM\Column(name="inside", type="boolean", nullable=false)
     */
    private $inside = false;

    /**
     * @var \Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Person[] Propietarios del inmueble
     *
     * @ORM\ManyToMany(targetEntity="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Person")
     * @ORM\JoinTable(
     *     name="housings_owners",
     *     joinColumns={@ORM\JoinColumn(name="housing_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id", nullable=false)}
     * )
     */
    private $owners;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Image", mappedBy="housing", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $images;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var float Gastos comunidad mensuales
     *
     * @ORM\Column(name="community_charges", type="float", precision=10, scale=2, nullable=true)
     */
    private $communityCharges;

    /**
     * @var float IBI
     *
     * @ORM\Column(name="ibi", type="float", precision=10, scale=2, nullable=true)
     */
    private $ibi;

    /**
     * @var boolean Seguridad
     * 
     * @ORM\Column(name="security", type="boolean", nullable=false)
     */
    private $security = false;

    /**
     * @var NewBuildingStatusCatalogue Estado nueva construcción
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\NewBuildingStatusCatalogue")
     * @ORM\JoinColumn(name="new_building_status_id", referencedColumnName="id", nullable=true)
     */
    private $newBuildingStatus;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return \DateTime
     */
    public function getAvailabilityDate()
    {
        return $this->availabilityDate;
    }

    /**
     * @param \DateTime $availabilityDate
     */
    public function setAvailabilityDate($availabilityDate)
    {
        $this->availabilityDate = $availabilityDate;
    }

    /**
     * @return boolean
     */
    public function isBankProperty()
    {
        return $this->bankProperty;
    }

    /**
     * @param boolean $bankProperty
     */
    public function setBankProperty($bankProperty)
    {
        $this->bankProperty = $bankProperty;
    }

    /**
     * @return string
     */
    public function getBuildingYear()
    {
        return $this->buildingYear;
    }

    /**
     * @param string $buildingYear
     */
    public function setBuildingYear($buildingYear)
    {
        $this->buildingYear = $buildingYear;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getFloorArea()
    {
        return $this->floorArea;
    }

    /**
     * @param float $floorArea
     */
    public function setFloorArea($floorArea)
    {
        $this->floorArea = $floorArea;
    }

    /**
     * @return boolean
     */
    public function isForRent()
    {
        return $this->forRent;
    }

    /**
     * @param boolean $forRent
     */
    public function setForRent($forRent)
    {
        $this->forRent = $forRent;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return boolean
     */
    public function isInside()
    {
        return $this->inside;
    }

    /**
     * @param boolean $inside
     */
    public function setInside($inside)
    {
        $this->inside = $inside;
    }

    /**
     * @return \Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param \Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\City $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return boolean
     */
    public function isLuxuryProperty()
    {
        return $this->luxuryProperty;
    }

    /**
     * @param boolean $luxuryProperty
     */
    public function setLuxuryProperty($luxuryProperty)
    {
        $this->luxuryProperty = $luxuryProperty;
    }

    /**
     * @return boolean
     */
    public function isOnSale()
    {
        return $this->onSale;
    }

    /**
     * @param boolean $onSale
     */
    public function setOnSale($onSale)
    {
        $this->onSale = $onSale;
    }

    /**
     * @return OrientationCatalogue
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * @param OrientationCatalogue $orientation
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
    }

    /**
     * @return boolean
     */
    public function isOutside()
    {
        return $this->outside;
    }

    /**
     * @param boolean $outside
     */
    public function setOutside($outside)
    {
        $this->outside = $outside;
    }

    /**
     * @return \Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Person[]
     */
    public function getOwners()
    {
        return $this->owners;
    }

    /**
     * @param \Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Person[] $owners
     */
    public function setOwners($owners)
    {
        $this->owners = $owners;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPriceOffer()
    {
        return $this->priceOffer;
    }

    /**
     * @param float $priceOffer
     */
    public function setPriceOffer($priceOffer)
    {
        $this->priceOffer = $priceOffer;
    }

    /**
     * @return \Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\State
     */
    public function getLocationState()
    {
        return $this->locationState;
    }

    /**
     * @param \Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\State $locationState
     */
    public function setLocationState($locationState)
    {
        $this->locationState = $locationState;
    }

    /**
     * @return float
     */
    public function getRentableArea()
    {
        return $this->rentableArea;
    }

    /**
     * @param float $rentableArea
     */
    public function setRentableArea($rentableArea)
    {
        $this->rentableArea = $rentableArea;
    }

    /**
     * @return boolean
     */
    public function isRented()
    {
        return $this->rented;
    }

    /**
     * @param boolean $rented
     */
    public function setRented($rented)
    {
        $this->rented = $rented;
    }

    /**
     * @return boolean
     */
    public function isSold()
    {
        return $this->sold;
    }

    /**
     * @param boolean $sold
     */
    public function setSold($sold)
    {
        $this->sold = $sold;
    }

    /**
     * @return ConservationStatusCatalogue
     */
    public function getConservationStatus()
    {
        return $this->conservationStatus;
    }

    /**
     * @param ConservationStatusCatalogue $conservationStatus
     */
    public function setConservationStatus($conservationStatus)
    {
        $this->conservationStatus = $conservationStatus;
    }

    /**
     * @return float
     */
    public function getUsableArea()
    {
        return $this->usableArea;
    }

    /**
     * @param float $usableArea
     */
    public function setUsableArea($usableArea)
    {
        $this->usableArea = $usableArea;
    }

    /**
     * @return \Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Zone
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * @param \Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Zone $zone
     */
    public function setZone($zone)
    {
        $this->zone = $zone;
    }

    /**
     * @return ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param ArrayCollection $images
     */
    public function setImages(ArrayCollection $images)
    {
        $this->images = $images;

        foreach ($images as $image)
        {
            $image->setHousing($this);
        }
    }

    /**
     * @param Image $image
     */
    public function addImage(Image $image)
    {
        $image->setHousing($this);
        $this->getImages()->add($image);
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return float
     */
    public function getCommunityCharges()
    {
        return $this->communityCharges;
    }

    /**
     * @param float $communityCharges
     */
    public function setCommunityCharges($communityCharges)
    {
        $this->communityCharges = $communityCharges;
    }

    /**
     * @return float
     */
    public function getIbi()
    {
        return $this->ibi;
    }

    /**
     * @param float $ibi
     */
    public function setIbi($ibi)
    {
        $this->ibi = $ibi;
    }

    /**
     * @return boolean
     */
    public function isSecurity()
    {
        return $this->security;
    }

    /**
     * @param boolean $security
     */
    public function setSecurity($security)
    {
        $this->security = $security;
    }
    
    /**
     * @param Image $image
     */
    public function removeImage(Image $image)
    {
        $this->getImages()->removeElement($image);
        $util = new Util();
        $util->removeUploadedFile($util->getUploadImagesDir().'/'.$image->getPath());
    }

    /**
     * @return NewBuildingStatusCatalogue
     */
    public function getNewBuildingStatus()
    {
        return $this->newBuildingStatus;
    }

    /**
     * @param NewBuildingStatusCatalogue $newBuildingStatus
     */
    public function setNewBuildingStatus($newBuildingStatus)
    {
        $this->newBuildingStatus = $newBuildingStatus;
    }
}
