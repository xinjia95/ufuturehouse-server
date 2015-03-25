<?php

namespace Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Alvaro de la Vega Olmedilla <alvarodlvo@gmail.com>
 * @since 1.0
 *
 * @ORM\Entity
 * @ORM\Table(name="locations_states")
 */
class State
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
     * @var City[]
     *
     * @ORM\OneToMany(targetEntity="City", mappedBy="id")
     */
    private $cities;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Coordinate", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinTable(
     *      name="locations_states_coordinates",
     *      joinColumns={@ORM\JoinColumn(name="state_id", referencedColumnName="id")},
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
     * @return City[]
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @param City[] $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
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
