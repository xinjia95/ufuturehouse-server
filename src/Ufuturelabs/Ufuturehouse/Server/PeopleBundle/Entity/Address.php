<?php

namespace Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="people_addresses")
 */
class Address
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
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Person", inversedBy="id")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $person;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=140, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=140, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=10, nullable=false)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=140, nullable=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=140, nullable=false)
     */
    private $description;

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
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
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
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Person|null $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }
}
