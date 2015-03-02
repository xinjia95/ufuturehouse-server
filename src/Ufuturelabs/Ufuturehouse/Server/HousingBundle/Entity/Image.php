<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Image
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="housings_images")
 *
 * @UniqueEntity("path")
 */
class Image
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
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     */
    private $path;

    /**
     * @var UploadedFile
     *
     * @Assert\Image()
     */
    private $image;

    /**
     * @var Housing
     *
     * @ORM\ManyToOne(targetEntity="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing")
     * @ORM\JoinColumn(name="housing_id", referencedColumnName="id", nullable=true)
     */
    private $housing;

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
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return UploadedFile
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param UploadedFile $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return Housing
     */
    public function getHousing()
    {
        return $this->housing;
    }

    /**
     * @param Housing $housing
     */
    public function setHousing(Housing $housing)
    {
        $this->housing = $housing;
    }

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
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
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getImage())
        {
            $filename = sha1(uniqid(mt_rand(), true));

            if (file_exists($this->getAbsolutePath())) {
                unlink($this->getAbsolutePath());
            }

            $this->path = $filename.'.'.$this->getImage()->getClientOriginalExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getImage()) return;

        $this->getImage()->move($this->getUploadRootDir(), $this->path);

        $this->image = null;
    }

    /** @ORM\PostRemove() */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath();

        if ($file) unlink($file);
    }
}
