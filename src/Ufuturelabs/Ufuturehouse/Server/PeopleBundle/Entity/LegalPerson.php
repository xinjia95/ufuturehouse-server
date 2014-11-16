<?php

namespace Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="people_legal")
 */
class LegalPerson extends Person
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, unique=true, nullable=false, name="bussines_name")
     */
    private $bussinesName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable=true, name="telephone")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=9, nullable=true, name="fax")
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="address")
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, unique=true, nullable=true, name="email")
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true, name="creation_date")
     */
    private $creation_date;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true, name="contact_person")
     */
    private $contact_person;

    function __toString()
    {
        return $this->bussinesName;
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
     * @return string
     */
    public function getBussinesName()
    {
        return $this->bussinesName;
    }

    /**
     * @param string $bussinesName
     */
    public function setBussinesName($bussinesName)
    {
        $this->bussinesName = $bussinesName;
    }

    /**
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contact_person;
    }

    /**
     * @param string $contact_person
     */
    public function setContactPerson($contact_person)
    {
        $this->contact_person = $contact_person;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * @param \DateTime $creation_date
     */
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
}