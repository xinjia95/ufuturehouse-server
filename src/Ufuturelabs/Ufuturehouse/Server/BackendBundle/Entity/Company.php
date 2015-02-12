<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Xinjia\SpainValidatorBundle\Validator as SpainAssert;

/**
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="companies")
 */
class Company {

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

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
     * @ORM\Column(name="telephone", type="string", length=15, nullable=false)
     *
     * @SpainAssert\Phone()
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=15, nullable=false)
     *
     * @SpainAssert\Phone()
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=140, nullable=false)
     *
     * @Assert\Email()
     */
    private $email;

    /**
     * @var UploadedFile
     *
     * @Assert\Image()
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="logo_path", type="string", length=255, nullable=true)
     */
    private $logoPath;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     *
     * @Assert\Url()
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     *
     * @Assert\Url()
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="google_plus", type="string", length=255, nullable=true)
     *
     * @Assert\Url()
     */
    private $googlePlus;

    /**
     * @var string
     *
     * @ORM\Column(name="google_maps", type="string", length=255, nullable=true)
     *
     * @Assert\Url()
     */
    private $googleMaps;

    /**
     * @var string
     *
     * @ORM\Column(name="tumblr", type="string", length=255, nullable=true)
     *
     * @Assert\Url()
     */
    private $tumblr;

    /**
     * @var string
     *
     * @ORM\Column(name="pinterest", type="string", length=255, nullable=true)
     *
     * @Assert\Url()
     */
    private $pinterest;

    /**
     * @var string
     *
     * @ORM\Column(name="flickr", type="string", length=255, nullable=true)
     *
     * @Assert\Url()
     */
    private $flickr;

    /**
     * @var string
     *
     * @ORM\Column(name="youtube", type="string", length=255, nullable=true)
     *
     * @Assert\Url()
     */
    private $youtube;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedin", type="string", length=255, nullable=true)
     *
     * @Assert\Url()
     */
    private $linkedin;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @return string
     */
    public function getGooglePlus()
    {
        return $this->googlePlus;
    }

    /**
     * @param string $googlePlus
     */
    public function setGooglePlus($googlePlus)
    {
        $this->googlePlus = $googlePlus;
    }

    /**
     * @return string
     */
    public function getGoogleMaps()
    {
        return $this->googleMaps;
    }

    /**
     * @param string $googleMaps
     */
    public function setGoogleMaps($googleMaps)
    {
        $this->googleMaps = $googleMaps;
    }

    /**
     * @return string
     */
    public function getTumblr()
    {
        return $this->tumblr;
    }

    /**
     * @param string $tumblr
     */
    public function setTumblr($tumblr)
    {
        $this->tumblr = $tumblr;
    }

    /**
     * @return string
     */
    public function getPinterest()
    {
        return $this->pinterest;
    }

    /**
     * @param string $pinterest
     */
    public function setPinterest($pinterest)
    {
        $this->pinterest = $pinterest;
    }

    /**
     * @return string
     */
    public function getFlickr()
    {
        return $this->flickr;
    }

    /**
     * @param string $flickr
     */
    public function setFlickr($flickr)
    {
        $this->flickr = $flickr;
    }

    /**
     * @return string
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * @param string $youtube
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;
    }

    /**
     * @return string
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * @param string $linkedin
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
    }

    public function getAbsolutePath()
    {
        return null === $this->logoPath ? null : $this->getUploadRootDir().'/'.$this->logoPath;
    }

    public function getWebPath()
    {
        return null === $this->logoPath ? null : $this->getUploadDir().'/'.$this->logoPath;
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'uploads/images';
    }

    /**
     * @return string
     */
    public function getLogoPath()
    {
        return $this->logoPath;
    }

    /**
     * @param string $logoPath
     */
    public function setLogoPath($logoPath)
    {
        $this->logoPath = $logoPath;
    }

    /**
     * @return UploadedFile
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param UploadedFile $logo
     */
    public function setLogo(UploadedFile $logo = null)
    {
        $this->logo = $logo;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getLogo())
        {
            $filename = sha1(uniqid(mt_rand(), true));
            $this->logoPath = $filename.'.'.$this->getLogo()->getClientOriginalExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getLogo()) return;

        $this->getLogo()->move($this->getUploadRootDir(), $this->logoPath );

        $this->logo = null;
    }

    /** @ORM\PostRemove() */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath().'/'.$this->getLogoPath();

        if ($file) unlink($file);
    }
}