<?php

namespace Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="people_physical")
 */
class PhysicalPerson extends Person
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, unique=true, name="dni", length=9)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, unique=true, name="nie", length=9)
     */
    private $nie;

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
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, name="telephone", length=15)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, name="email", length=30)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, name="address", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, name="bank_account", length=25)
     */
    private $bankAccount;

    function __toString()
    {
        return $this->firstname." ".$this->surname.(!is_null($this->secondSurname) ? "" : " ".$this->secondSurname);
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
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param string $bankAccount
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
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
    public function getNie()
    {
        return $this->nie;
    }

    /**
     * @param string $nie
     */
    public function setNie($nie)
    {
        $this->nie = $nie;
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