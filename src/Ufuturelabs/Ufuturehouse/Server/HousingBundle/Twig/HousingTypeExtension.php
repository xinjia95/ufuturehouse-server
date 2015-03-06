<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Twig;

use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;

class HousingTypeExtension extends \Twig_Extension
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'get_housing_type';
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction($this->getName(), array($this, 'getHousingType')),
        );
    }

    /**
     * @param Housing $object
     * @return string
     * @throws \Exception
     */
    public function getHousingType(Housing $object)
    {
        switch (get_class($object))
        {
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Flat':
                $type = 'navbar.housing.residence.vertical.flat';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Apartment':
                $type = 'navbar.housing.residence.vertical.apartment';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Study':
                $type = 'navbar.housing.residence.vertical.study';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Penthouse':
                $type = 'navbar.housing.residence.vertical.penthouse';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\FirstFloor':
                $type = 'navbar.housing.residence.vertical.firts_floor';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Duplex':
                $type = 'navbar.housing.residence.vertical.duplex';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Attic':
                $type = 'navbar.housing.residence.vertical.attic';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\PenthouseDuplex':
                $type = 'navbar.housing.residence.vertical.penthouse_duplex';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Loft':
                $type = 'navbar.housing.residence.vertical.loft';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\DetachedHouse':
                $type = 'navbar.housing.residence.horizontal.detached_house';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Townhouse':
                $type = 'navbar.housing.residence.horizontal.townhouse';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\SemidetachedHouse':
                $type = 'navbar.housing.residence.horizontal.semidetached_house';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\UrbanDevelopmentDetachedHouse':
                $type = 'navbar.housing.residence.horizontal.urban_development_detached_house';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Villa':
                $type = 'navbar.housing.residence.horizontal.villa';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Ranch':
                $type = 'navbar.housing.residence.horizontal.ranch';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Tower':
                $type = 'navbar.housing.residence.horizontal.tower';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Castle':
                $type = 'navbar.housing.residence.horizontal.castle';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Bungalow':
                $type = 'navbar.housing.residence.horizontal.bungalow';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\House':
                $type = 'navbar.housing.residence.horizontal.house';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\CountryHouse':
                $type = 'navbar.housing.residence.horizontal.country_house';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Office':
                $type = 'navbar.housing.office';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial\CommercialProperty':
                $type = 'navbar.housing.commercial.commercial_property';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial\Storehouse':
                $type = 'navbar.housing.commercial.storehouse';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial\Archive':
                $type = 'navbar.housing.commercial.archive';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Warehouse':
                $type = 'navbar.housing.warehouse';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Garage':
                $type = 'navbar.housing.garage';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Storage':
                $type = 'navbar.housing.storage';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor\NonUrbanFloor':
                $type = 'navbar.housing.floor.non_urban';
                break;
            case 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor\UrbanFloor':
                $type = 'navbar.housing.floor.urban';
                break;
            default:
                $type = 'housing';
                break;
        }

        return $type;
    }
}