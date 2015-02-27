<?php

namespace Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Alvaro de la Vega Olmedilla <alvarodlvo@gmail.com>
 * @since 1.0
 *
 * @ORM\Entity
 * @ORM\Table(name="cities")
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
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id", nullable=false)
     */
    private $state;

    /**
     * @var Zone[]
     *
     * @ORM\OneToMany(targetEntity="Zone", mappedBy="id")
     */
    private $zones;

    function __toString()
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
}
