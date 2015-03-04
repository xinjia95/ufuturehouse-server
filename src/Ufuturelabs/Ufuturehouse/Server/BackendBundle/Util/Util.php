<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Util;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity\Company;

class Util
{
    /** @var EntityManager */
    private $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param string $extension
     * @return string
     */
    public function generateFilename($extension)
    {
        return sha1(uniqid(mt_rand(), true)).'.'.$extension;
    }

    /**
     * @param UploadedFile $file
     * @param string $uploadRootDir
     * @param string $filename
     */
    public function uploadFile(UploadedFile $file, $uploadRootDir, $filename)
    {
        if (null === $file)
        {
            return;
        }

        $file->move($uploadRootDir, $filename);
    }

    /**
     * @param string $absolutePath
     */
    public function removeUploadedFile($absolutePath)
    {
        if ($absolutePath)
        {
            unlink($absolutePath);
        }
    }

    /**
     * @param string $path Absolute path
     * @param UploadedFile $file Image to create favicons
     */
    public function generateFavicons($path, UploadedFile $file)
    {
        $company = $this->em->getRepository('BackendBundle:Company')->findAll()[0];

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
            'name' => $company->getName(),
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
        $tile->addChild('TileColor', $company->getPrimaryColor());

        $browserconfig = $xmlBrowserconfig->asXML();

        imagepng($imageAppleTouchIcon57x57, $this->getWebDir().'/'.'apple-touch-icon-57x57.png');
        imagepng($imageAppleTouchIcon60x60, $this->getWebDir().'/'.'apple-touch-icon-60x60.png');
        imagepng($imageAppleTouchIcon72x72, $this->getWebDir().'/'.'apple-touch-icon-72x72.png');
        imagepng($imageAppleTouchIcon76x76, $this->getWebDir().'/'.'apple-touch-icon-76x76.png');
        imagepng($imageAppleTouchIcon114x114, $this->getWebDir().'/'.'apple-touch-icon-114x114.png');
        imagepng($imageAppleTouchIcon120x120, $this->getWebDir().'/'.'apple-touch-icon-120x120.png');
        imagepng($imageAppleTouchIcon144x144, $this->getWebDir().'/'.'apple-touch-icon-144x144.png');
        imagepng($imageAppleTouchIcon152x152, $this->getWebDir().'/'.'apple-touch-icon-152x152.png');
        imagepng($imageAppleTouchIcon180x180, $this->getWebDir().'/'.'apple-touch-icon-180x180.png');
        imagepng($favicon16x16, $this->getWebDir().'/'.'favicon-16x16.png');
        imagepng($favicon32x32, $this->getWebDir().'/'.'favicon-32x32.png');
        imagepng($favicon96x96, $this->getWebDir().'/'.'favicon-96x96.png');
        imagepng($androidChrome192x192, $this->getWebDir().'/'.'android-chrome-192x192.png');
        imagepng($msTile144x144, $this->getWebDir().'/'.'mstile-144x144.png');
        imagepng($favicon, $this->getWebDir().'/'.'favicon.ico');

        $this->writeFile($manifest, 'manifest.json', $this->getWebDir());

        if ($browserconfig !== false)
        {
            $this->writeFile($browserconfig, 'browserconfig.xml', $this->getWebDir());
        }
    }

    /**
     * @param string $path
     * @param resource $image
     * @param integer $newWidth
     * @param integer $newHeight
     * @return resource
     */
    public function resizeImage($path, $image, $newWidth, $newHeight)
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
    public function writeFile($file, $fileName, $path)
    {
        $newFile = fopen($path.'/'.$fileName, 'w');
        fwrite($newFile, $file);
        fclose($newFile);
    }

    public function getWebDir()
    {
        return __DIR__.'/../../../../../../web/';
    }

    public function getUploadDir()
    {
        return 'uploads';
    }

    public function getAbsoluteUploadDir()
    {
        return $this->getWebDir().'/'.$this->getUploadDir();
    }

    public function getUploadImagesDir()
    {
        return $this->getUploadDir().'/images';
    }

    public function getAbsoluteUploadImagesDir()
    {
        return $this->getWebDir().'/'.$this->getUploadImagesDir();
    }
}
