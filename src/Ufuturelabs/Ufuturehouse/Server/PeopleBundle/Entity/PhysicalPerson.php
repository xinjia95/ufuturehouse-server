<?php

namespace Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Xinjia\SpainValidatorBundle\Validator as SpainAssert;

/**
 * @ORM\Entity
 * @ORM\Table(name="people_physical")
 *
 * @UniqueEntity("dni")
 */
class PhysicalPerson extends Person
{
    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=9, nullable=false, unique=true)
     *
     * @SpainAssert\Dni()
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false, name="firstname", length=30)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true, nullable=false, name="surname", length=30)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, name="second_surname", length=30)
     */
    private $secondSurname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=false)
     *
     * @Assert\Date()
     */
    private $birthday;

    public function __toString()
    {
        return $this->firstname." ".$this->surname.(!is_null($this->secondSurname) ? "" : " ".$this->secondSurname);
    }

    /**
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param string $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getSecondSurname()
    {
        return $this->secondSurname;
    }

    /**
     * @param string $secondSurname
     */
    public function setSecondSurname($secondSurname)
    {
        $this->secondSurname = $secondSurname;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param \DateTime $birthday
     */
    public function setBirthday(\DateTime $birthday)
    {
        $this->birthday = $birthday;
    }
}
