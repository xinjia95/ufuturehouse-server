<?php

namespace Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Alvaro de la Vega Olmedilla <alvarodlvo@gmail.com>
 * @since 1.0
 *
 * @ORM\Entity
 * @ORM\Table(name="locations")
 */
class Location
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
     * @var Province
     *
     * @ORM\ManyToOne(targetEntity="Province")
     * @ORM\JoinColumn(name="province_id", referencedColumnName="id", nullable=false)
     */
    private $province;

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
     * @return Province
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param Province $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
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