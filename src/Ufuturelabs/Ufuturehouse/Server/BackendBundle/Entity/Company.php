<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
     * @ORM\Column(name="street", type="string", length=140, nullable=true)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=140, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=10, nullable=true)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=140, nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=15, nullable=true)
     *
     * @SpainAssert\Phone()
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=15, nullable=true)
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
     * @var string
     *
     * @ORM\Column(name="primary_color", type="string", length=7, nullable=false)
     */
    private $primaryColor = '#197CE2';

    /**
     * @var string
     *
     * @ORM\Column(name="secundary_color", type="string", length=7, nullable=false)
     */
    private $secundaryColor = '#6AA8E9';

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

    /**
     * @return string
     */
    public function getPrimaryColor()
    {
        return $this->primaryColor;
    }

    /**
     * @param string $primaryColor
     */
    public function setPrimaryColor($primaryColor)
    {
        $this->primaryColor = $primaryColor;
    }

    /**
     * @return string
     */
    public function getSecundaryColor()
    {
        return $this->secundaryColor;
    }

    /**
     * @param string $secundaryColor
     */
    public function setSecundaryColor($secundaryColor)
    {
        $this->secundaryColor = $secundaryColor;
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

            if (file_exists($this->getAbsolutePath())) {
                unlink($this->getAbsolutePath());
            }

            $this->logoPath = $filename.'.'.$this->getLogo()->getClientOriginalExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getLogo())
        {
            return;
        }

        $this->getLogo()->move($this->getUploadRootDir(), $this->logoPath);

        $this->createFavicons($this->getAbsolutePath(), $this->getLogo());

        $this->logo = null;
    }

    /** @ORM\PostRemove() */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath();

        if ($file)
        {
            unlink($file);
        }
    }

    /**
     * @param string $path Absolute path
     * @param UploadedFile $file Image to create favicons
     */
    public function createFavicons($path, UploadedFile $file)
    {
        switch ($file->getClientMimeType())
        {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($path);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($path);
                break;
            case 'image/png':
                $image = imagecreatefrompng($path);
                break;
            case 'image/bmp':
                $image = imagecreatefromwbmp($path);
                break;
            default:
                throw new \InvalidArgumentException('Invalid image type');
        }

        $imageAppleTouchIcon57x57 = $this->resizeImage($path, $image, 57, 57);
        $imageAppleTouchIcon60x60 = $this->resizeImage($path, $image, 60, 60);
        $imageAppleTouchIcon72x72 = $this->resizeImage($path, $image, 72, 57);
        $imageAppleTouchIcon76x76 = $this->resizeImage($path, $image, 76, 76);
        $imageAppleTouchIcon114x114 = $this->resizeImage($path, $image, 114, 114);
        $imageAppleTouchIcon120x120 = $this->resizeImage($path, $image, 120, 120);
        $imageAppleTouchIcon144x144 = $this->resizeImage($path, $image, 144, 144);
        $imageAppleTouchIcon152x152 = $this->resizeImage($path, $image, 152, 152);
        $imageAppleTouchIcon180x180 = $this->resizeImage($path, $image, 180, 180);
        $favicon16x16 = $this->resizeImage($path, $image, 16, 16);
        $favicon32x32 = $this->resizeImage($path, $image, 32, 32);
        $favicon96x96 = $this->resizeImage($path, $image, 96, 96);
        $androidChrome192x192 = $this->resizeImage($path, $image, 192, 192);
        $msTile144x144 = $this->resizeImage($path, $image, 144, 144);
        $favicon = $this->resizeImage($path, $image, 256, 256);

        $manifest = json_encode(array(
            'name' => $this->name,
            'icons' => array(
                array(
                    'src' => 'android-chrome-36x36.png',
                    'sizes' => '36x36',
                    'type' => 'image/png',
                    'density' => '0.75',
                ),
                array(
                    'src' => 'android-chrome-48x48.png',
                    'sizes' => '48x48',
                    'type' => 'image/png',
                    'density' => '1.0',
                ),
                array(
                    'src' => 'android-chrome-72x72.png',
                    'sizes' => '72x72',
                    'type' => 'image/png',
                    'density' => '1.5',
                ),
                array(
                    'src' => 'android-chrome-96x96.png',
                    'sizes' => '96x96',
                    'type' => 'image/png',
                    'density' => '2.0',
                ),
                array(
                    'src' => 'android-chrome-144x144.png',
                    'sizes' => '144x144',
                    'type' => 'image/png',
                    'density' => '3.0',
                ),
                array(
                    'src' => 'android-chrome-192x192.png',
                    'sizes' => '192x192',
                    'type' => 'image/png',
                    'density' => '4.0',
                ),
            ),
        ));

        $xmlBrowserconfig = new \SimpleXMLElement('<browserconfig />');

        $msapplication = $xmlBrowserconfig->addChild('msapplication');
        $tile = $msapplication->addChild('tile');
        $tile->addChild('square70x70logo')->addAttribute('src', 'mstile-70x70.png');
        $tile->addChild('square150x150logo')->addAttribute('src', 'mstile-150x150.png');
        $tile->addChild('square310x310logo')->addAttribute('src', 'mstile-310x310.png');
        $tile->addChild('wide310x150logo')->addAttribute('src', 'mstile-310x150.png');
        $tile->addChild('TileColor', $this->primaryColor);

        $browserconfig = $xmlBrowserconfig->asXML();

        $uploadDir = __DIR__.'/../../../../../../web';

        imagepng($imageAppleTouchIcon57x57, $uploadDir.'/'.'apple-touch-icon-57x57.png');
        imagepng($imageAppleTouchIcon60x60, $uploadDir.'/'.'apple-touch-icon-60x60.png');
        imagepng($imageAppleTouchIcon72x72, $uploadDir.'/'.'apple-touch-icon-72x72.png');
        imagepng($imageAppleTouchIcon76x76, $uploadDir.'/'.'apple-touch-icon-76x76.png');
        imagepng($imageAppleTouchIcon114x114, $uploadDir.'/'.'apple-touch-icon-114x114.png');
        imagepng($imageAppleTouchIcon120x120, $uploadDir.'/'.'apple-touch-icon-120x120.png');
        imagepng($imageAppleTouchIcon144x144, $uploadDir.'/'.'apple-touch-icon-144x144.png');
        imagepng($imageAppleTouchIcon152x152, $uploadDir.'/'.'apple-touch-icon-152x152.png');
        imagepng($imageAppleTouchIcon180x180, $uploadDir.'/'.'apple-touch-icon-180x180.png');
        imagepng($favicon16x16, $uploadDir.'/'.'favicon-16x16.png');
        imagepng($favicon32x32, $uploadDir.'/'.'favicon-32x32.png');
        imagepng($favicon96x96, $uploadDir.'/'.'favicon-96x96.png');
        imagepng($androidChrome192x192, $uploadDir.'/'.'android-chrome-192x192.png');
        imagepng($msTile144x144, $uploadDir.'/'.'mstile-144x144.png');
        imagepng($favicon, $uploadDir.'/'.'favicon.ico');

        $this->writeFile($manifest, 'manifest.json', $uploadDir);
        $this->writeFile($browserconfig, 'browserconfig.xml', $uploadDir);

    }

    /**
     * @param string $path
     * @param resource $image
     * @param integer $newWidth
     * @param integer $newHeight
     * @return resource
     */
    private function resizeImage($path, $image, $newWidth, $newHeight)
    {
        list($width, $height) = getimagesize($path);

        $thumb = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresized($thumb, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        return $thumb;
    }

    /**
     * @param string $file
     * @param string $fileName
     * @param string $path
     */
    private function writeFile($file, $fileName, $path)
    {
        $newFile = fopen($path.'/'.$fileName, 'w');
        fwrite($newFile, $file);
        fclose($newFile);
    }
}
