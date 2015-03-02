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
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Phonenumber", mappedBy="person", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Assert\Valid
     */
    private $phonenumbers;

    /**
     * @var Email[]
     *
     * @ORM\OneToMany(targetEntity="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Email", mappedBy="person", cascade={"persist", "remove"}, orphanRemoval=true)
     *
     * @Assert\Valid
     */
    private $emails;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\BankAccount", mappedBy="person", cascade={"persist", "remove"}, orphanRemoval=true)
     *
     * @Assert\Valid
     */
    private $bankAccounts;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Address", mappedBy="person", cascade={"persist", "remove"}, orphanRemoval=true)
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
     * @return ArrayCollection
     */
    public function getPhonenumbers()
    {
        return $this->phonenumbers;
    }

    /**
     * @param ArrayCollection $phonenumbers
     */
    public function setPhonenumbers(ArrayCollection $phonenumbers)
    {
        $this->phonenumbers = $phonenumbers;

        foreach ($phonenumbers as $phonenumber) {
            $phonenumber->setPerson($this);
        }
    }

    /**
     * @param $phonenumber Phonenumber
     */
    public function addPhonenumber(Phonenumber $phonenumber)
    {
        $phonenumber->setPerson($this);
        $this->phonenumbers->add($phonenumber);
    }

    /**
     * @param $phonenumber Phonenumber
     */
    public function removePhonenumber(Phonenumber $phonenumber)
    {
        $this->phonenumbers->removeElement($phonenumber);
        $phonenumber->setPerson(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param $emails ArrayCollection
     */
    public function setEmails(ArrayCollection $emails)
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
        $email->setPerson($this);
        $this->emails->add($email);
    }

    /**
     * @param $email Email
     */
    public function removeEmail(Email $email)
    {
        $this->emails->removeElement($email);
        $email->setPerson(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getBankAccounts()
    {
        return $this->bankAccounts;
    }

    /**
     * @param ArrayCollection $bankAccounts
     */
    public function setBankAccounts(ArrayCollection $bankAccounts)
    {
        foreach ($bankAccounts as $bankAccount)
        {
            $bankAccount->setPerson($this);
        }

        $this->bankAccounts = $bankAccounts;
    }

    /**
     * @param $bankAccount BankAccount
     */
    public function addBankAccount(BankAccount $bankAccount)
    {
        $bankAccount->setPerson($this);
        $this->bankAccounts->add($bankAccount);
    }

    /**
     * @param $bankAccount BankAccount
     */
    public function removeBankAccount(BankAccount $bankAccount)
    {
        $this->bankAccounts->removeElement($bankAccount);
        $bankAccount->setPerson(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param ArrayCollection $addresses
     */
    public function setAddresses(ArrayCollection $addresses)
    {
        foreach ($addresses as $address)
        {
            $address->setPerson($this);
        }
        $this->addresses = $addresses;
    }

    /**
     * @param $address Address
     */
    public function addAddress(Address $address)
    {
        $address->setPerson($this);
        $this->addresses->add($address);
    }

    /**
     * @param $address Address
     */
    public function removeAddress(Address $address)
    {
        $this->addresses->removeElement($address);
        $address->setPerson(null);
    }
}
