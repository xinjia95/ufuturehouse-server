<?php

namespace Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="people_legal")
 * @UniqueEntity("cif")
 */
class LegalPerson extends Person
{
    /**
     * @var string
     *
     * @ORM\Column(name="cif", type="string", length=9, nullable=true, unique=true)
     */
    private $cif;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, unique=true, nullable=false, name="bussines_name")
     */
    private $bussinessName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true, name="creation_date")
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=true, name="contact_person")
     */
    private $contactPerson;

    public function __toString()
    {
        return $this->bussinessName;
    }

    /**
     * @return string
     */
    public function getBussinessName()
    {
        return $this->bussinessName;
    }

    /**
     * @param string $bussinessName
     */
    public function setBussinessName($bussinessName)
    {
        $this->bussinessName = $bussinessName;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * @param string $contactPerson
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;
    }

    /**
     * @return string
     */
    public function getCif()
    {
        return $this->cif;
    }

    /**
     * @param string $cif
     */
    public function setCif($cif)
    {
        $this->cif = $cif;
    }
}
