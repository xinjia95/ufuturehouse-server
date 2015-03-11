<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Twig;

use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Twig\HousingTypeExtension;

class BackendExtension extends \Twig_Extension
{
    /** @var HousingTypeExtension */
    private $housingTypeExtension;

    function __construct()
    {
        $this->housingTypeExtension = new HousingTypeExtension();
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'get_housing_route_prefix';
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction($this->getName(), array($this, 'getHousingRoutePrefix')),
        );
    }

    /**
     * @param Housing $housing
     * @return string
     */
    public function getHousingRoutePrefix(Housing $housing)
    {
        switch ($this->housingTypeExtension->getHousingType($housing))
        {
            // TODO More cases when routes are made
            case 'navbar.housing.residence.vertical.flat':
                $route = 'backend_housing_residence_vertical_flat_';
                break;
            default:
                $route = '';
                break;
        }

        return $route;
    }
}
