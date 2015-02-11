<?php

namespace Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="emails")
 * @UniqueEntity("email")
 */
class Email
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
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Person", inversedBy="id", cascade={"persist"})
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $person;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=140, nullable=false, unique=true)
     *
     * @Assert\Email(checkMX = true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=140, nullable=false)
     */
    private $description;

    function __toString()
    {
        return $this->getEmail();
    }


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
} 