<?php

namespace Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Xinjia\SpainValidatorBundle\Validator as SpainAssert;

/**
 * @ORM\Entity
 * @ORM\Table(name="people_phonenumbers")
 */
class Phonenumber
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
     * @ORM\Column(name="number", type="string", length=20, nullable=false)
     *
     * @Assert\NotNull()
     * @SpainAssert\Phone()
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=140, nullable=true)
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
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
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
