<?php

namespace Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Alvaro de la Vega Olmedilla <alvarodlvo@gmail.com>
 * @since 1.0
 *
 * @ORM\Entity
 * @ORM\Table(name="locations_cities")
 */
class City
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", name="id")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=false, name="name")
     */
    private $name;

    /**
     * @var State
     *
     * @ORM\ManyToOne(targetEntity="State", inversedBy="cities")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id", nullable=false)
     */
    private $state;

    /**
     * @var Zone[]
     *
     * @ORM\OneToMany(targetEntity="Zone", mappedBy="id")
     */
    private $zones;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Coordinate", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinTable(
     *      name="locations_cities_coordinates",
     *      joinColumns={@ORM\JoinColumn(name="city_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="coordinate_id", referencedColumnName="id")}
     * )
     */
    private $coordinates;

    public function __construct()
    {
        $this->coordinates = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return State
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param State $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return Zone[]
     */
    public function getZones()
    {
        return $this->zones;
    }

    /**
     * @param Zone[] $zones
     */
    public function setZones($zones)
    {
        $this->zones = $zones;
    }

    /**
     * @return ArrayCollection
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param ArrayCollection $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @param Coordinate $coordinate
     * @return City
     */
    public function addCoordinate(Coordinate $coordinate)
    {
        $this->coordinates->add($coordinate);

        return $this;
    }

    /**
     * @param Coordinate $coordinate
     * @return City
     */
    public function removeCoordinate(Coordinate $coordinate)
    {
        $this->coordinates->removeElement($coordinate);

        return $this;
    }
}
