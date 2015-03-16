<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Ufuturelabs\Ufuturehouse\Server\BackendBundle\BackendBundle(),
            new Ufuturelabs\Ufuturehouse\Server\FrontendBundle\FrontendBundle(),
            new Ufuturelabs\Ufuturehouse\Server\PeopleBundle\PeopleBundle(),
            new Ufuturelabs\Ufuturehouse\Server\HousingBundle\HousingBundle(),
            new Ufuturelabs\Ufuturehouse\Server\LocationsBundle\LocationsBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Lunetics\LocaleBundle\LuneticsLocaleBundle(),
            new Xinjia\SpainValidatorBundle\XinjiaSpainValidatorBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new Elao\Bundle\FormTranslationBundle\ElaoFormTranslationBundle(),
            new Cocur\Slugify\Bridge\Symfony\CocurSlugifyBundle(),
            new Ivory\GoogleMapBundle\IvoryGoogleMapBundle(),
            new Widop\HttpAdapterBundle\WidopHttpAdapterBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
