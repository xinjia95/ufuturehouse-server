<?php

namespace Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping AS ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="people")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *     "physical"="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\PhysicalPerson",
 *     "legal"="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\LegalPerson"
 * })
 */
class Person
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
     * @var Phonenumber[]
     *
     * @ORM\OneToMany(targetEntity="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Phonenumber", mappedBy="person", cascade={"persist"})
     * @Assert\Valid
     */
    private $phonenumbers;

    /**
     * @var Email[]
     *
     * @ORM\OneToMany(targetEntity="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Email", mappedBy="person", cascade={"persist"})
     *
     * @Assert\Valid
     */
    private $emails;

    /**
     * @var BankAccount[]
     *
     * @ORM\OneToMany(targetEntity="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\BankAccount", mappedBy="person", cascade={"persist"})
     *
     * @Assert\Valid
     */
    private $bankAccounts;

    /**
     * @var Address[]
     *
     * @ORM\OneToMany(targetEntity="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Address", mappedBy="person", cascade={"persist"})
     *
     * @Assert\Valid
     */
    private $addresses;

    function __construct()
    {
        $this->phonenumbers = new ArrayCollection();
        $this->bankAccounts = new ArrayCollection();
        $this->emails = new ArrayCollection();
        $this->addresses = new ArrayCollection();
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Phonenumber[]
     */
    public function getPhonenumbers()
    {
        return $this->phonenumbers;
    }

    /**
     * @param Phonenumber[] $phonenumbers
     */
    public function setPhonenumbers($phonenumbers)
    {
        $this->phonenumbers = $phonenumbers;
    }

    /**
     * @param $phonenumber Phonenumber
     */
    public function addPhonenumber(Phonenumber $phonenumber)
    {
        $this->phonenumbers[] = $phonenumber;
    }

    /**
     * @param $phonenumber Phonenumber
     */
    public function removePhonenumber(Phonenumber $phonenumber)
    {
        unset($this->phonenumbers[$phonenumber->getId()]);
    }

    /**
     * @return Email[]
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param $emails Collection
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;

        foreach ($emails as $email) {
            $email->setPerson($this);
        }
    }

    /**
     * @param $email Email
     */
    public function addEmail(Email $email)
    {
        $this->emails[] = $email;
    }

    /**
     * @param $email Email
     */
    public function removeEmail(Email $email)
    {
        unset($this->emails[$email->getId()]);
    }

    /**
     * @return BankAccount[]
     */
    public function getBankAccounts()
    {
        return $this->bankAccounts;
    }

    /**
     * @param BankAccount[] $bankAccounts
     */
    public function setBankAccounts($bankAccounts)
    {
        $this->bankAccounts = $bankAccounts;
    }

    /**
     * @param $bankAccount BankAccount
     */
    public function addBankAccount(BankAccount $bankAccount)
    {
        $this->bankAccounts[] = $bankAccount;
    }

    /**
     * @param $bankAccount BankAccount
     */
    public function removeBankAccount(BankAccount $bankAccount)
    {
        unset($this->bankAccounts[$bankAccount->getId()]);
    }

    /**
     * @return Address[]
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param Address[] $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * @param $address Address
     */
    public function addAddress(Address $address)
    {
        $this->addresses[] = $address;
    }

    /**
     * @param $address Address
     */
    public function removeAddress(Address $address)
    {
        unset($this->addresses[$address->getId()]);
    }
}
