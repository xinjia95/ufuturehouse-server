<?php

namespace Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="people_bank_accounts")
 */
class BankAccount
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
     * @var string Titular
     *
     * @ORM\Column(name="holder", type="string", length=140, nullable=false)
     *
     * @Assert\NotNull()
     */
    private $holder;

    /**
     * @var string IBAN
     *
     * En España, el código IBAN sustituyó de manera definitiva al Código Cuenta Cliente (CCC) el 1 de febrero de 2014.
     *
     * @ORM\Column(name="bank_account_number", type="string", length=34, nullable=false)
     *
     * @Assert\Iban()
     */
    private $bankAccountNumber;

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
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param string $holder
     */
    public function setHolder($holder)
    {
        $this->holder = $holder;
    }

    /**
     * @return string
     */
    public function getBankAccountNumber()
    {
        return $this->bankAccountNumber;
    }

    /**
     * @param string $bankAccountNumber
     */
    public function setBankAccountNumber($bankAccountNumber)
    {
        $this->bankAccountNumber = $bankAccountNumber;
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
