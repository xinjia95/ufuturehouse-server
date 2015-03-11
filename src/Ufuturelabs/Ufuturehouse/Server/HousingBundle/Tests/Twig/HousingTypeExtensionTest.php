<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Tests\Twig;

use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial\Archive;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial\CommercialProperty;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Commercial\Storehouse;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor\NonUrbanFloor;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Floor\UrbanFloor;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Garage;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Office;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Bungalow;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Castle;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\CountryHouse;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\DetachedHouse;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\House;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Ranch;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\SemidetachedHouse;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Tower;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Townhouse;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\UrbanDevelopmentDetachedHouse;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceHorizontal\Villa;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Apartment;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Attic;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Duplex;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\FirstFloor;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Flat;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Loft;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Penthouse;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\PenthouseDuplex;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Study;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Storage;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Warehouse;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Twig\HousingTypeExtension;

class HousingTypeExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testGetHousingType()
    {
        $housingTypeExtension = new HousingTypeExtension();

        $this->assertEquals(
            'navbar.housing.residence.vertical.flat',
            $housingTypeExtension->getHousingType(new Flat()),
            'Should return: navbar.housing.residence.vertical.flat'
        );

        $this->assertEquals(
            'navbar.housing.residence.vertical.apartment',
            $housingTypeExtension->getHousingType(new Apartment()),
            'Should return: navbar.housing.residence.vertical.apartment'
        );

        $this->assertEquals(
            'navbar.housing.residence.vertical.study',
            $housingTypeExtension->getHousingType(new Study()),
            'Should return: navbar.housing.residence.vertical.study'
        );

        $this->assertEquals(
            'navbar.housing.residence.vertical.penthouse',
            $housingTypeExtension->getHousingType(new Penthouse()),
            'Should return: navbar.housing.residence.vertical.penthouse'
        );

        $this->assertEquals(
            'navbar.housing.residence.vertical.firts_floor',
            $housingTypeExtension->getHousingType(new FirstFloor()),
            'Should return: navbar.housing.residence.vertical.firts_floor'
        );

        $this->assertEquals(
            'navbar.housing.residence.vertical.duplex',
            $housingTypeExtension->getHousingType(new Duplex()),
            'Should return: navbar.housing.residence.vertical.duplex'
        );

        $this->assertEquals(
            'navbar.housing.residence.vertical.attic',
            $housingTypeExtension->getHousingType(new Attic()),
            'Should return: navbar.housing.residence.vertical.attic'
        );

        $this->assertEquals(
            'navbar.housing.residence.vertical.penthouse_duplex',
            $housingTypeExtension->getHousingType(new PenthouseDuplex()),
            'Should return: navbar.housing.residence.vertical.penthouse_duplex'
        );

        $this->assertEquals(
            'navbar.housing.residence.vertical.loft',
            $housingTypeExtension->getHousingType(new Loft()),
            'Should return: navbar.housing.residence.vertical.loft'
        );

        $this->assertEquals(
            'navbar.housing.residence.horizontal.detached_house',
            $housingTypeExtension->getHousingType(new DetachedHouse()),
            'Should return: navbar.housing.residence.horizontal.detached_house'
        );

        $this->assertEquals(
            'navbar.housing.residence.horizontal.townhouse',
            $housingTypeExtension->getHousingType(new Townhouse()),
            'Should return: navbar.housing.residence.horizontal.townhouse'
        );

        $this->assertEquals(
            'navbar.housing.residence.horizontal.semidetached_house',
            $housingTypeExtension->getHousingType(new SemidetachedHouse()),
            'Should return: navbar.housing.residence.horizontal.semidetached_house'
        );

        $this->assertEquals(
            'navbar.housing.residence.horizontal.urban_development_detached_house',
            $housingTypeExtension->getHousingType(new UrbanDevelopmentDetachedHouse()),
            'Should return: navbar.housing.residence.horizontal.urban_development_detached_house'
        );

        $this->assertEquals(
            'navbar.housing.residence.horizontal.villa',
            $housingTypeExtension->getHousingType(new Villa()),
            'Should return: navbar.housing.residence.horizontal.villa'
        );

        $this->assertEquals(
            'navbar.housing.residence.horizontal.ranch',
            $housingTypeExtension->getHousingType(new Ranch()),
            'Should return: navbar.housing.residence.horizontal.ranch'
        );

        $this->assertEquals(
            'navbar.housing.residence.horizontal.tower',
            $housingTypeExtension->getHousingType(new Tower()),
            'Should return: navbar.housing.residence.horizontal.tower'
        );

        $this->assertEquals(
            'navbar.housing.residence.horizontal.castle',
            $housingTypeExtension->getHousingType(new Castle()),
            'Should return: navbar.housing.residence.horizontal.castle'
        );

        $this->assertEquals(
            'navbar.housing.residence.horizontal.bungalow',
            $housingTypeExtension->getHousingType(new Bungalow()),
            'Should return: navbar.housing.residence.horizontal.bungalow'
        );

        $this->assertEquals(
            'navbar.housing.residence.horizontal.house',
            $housingTypeExtension->getHousingType(new House()),
            'Should return: navbar.housing.residence.horizontal.house'
        );

        $this->assertEquals(
            'navbar.housing.residence.horizontal.country_house',
            $housingTypeExtension->getHousingType(new CountryHouse()),
            'Should return: navbar.housing.residence.horizontal.country_house'
        );

        $this->assertEquals(
            'navbar.housing.office',
            $housingTypeExtension->getHousingType(new Office()),
            'Should return: navbar.housing.office'
        );

        $this->assertEquals(
            'navbar.housing.commercial.commercial_property',
            $housingTypeExtension->getHousingType(new CommercialProperty()),
            'Should return: navbar.housing.commercial.commercial_property'
        );

        $this->assertEquals(
            'navbar.housing.commercial.storehouse',
            $housingTypeExtension->getHousingType(new Storehouse()),
            'Should return: navbar.housing.commercial.storehouse'
        );

        $this->assertEquals(
            'navbar.housing.commercial.archive',
            $housingTypeExtension->getHousingType(new Archive()),
            'Should return: navbar.housing.commercial.archive'
        );

        $this->assertEquals(
            'navbar.housing.warehouse',
            $housingTypeExtension->getHousingType(new Warehouse()),
            'Should return: navbar.housing.warehouse'
        );

        $this->assertEquals(
            'navbar.housing.garage',
            $housingTypeExtension->getHousingType(new Garage()),
            'Should return: navbar.housing.garage'
        );

        $this->assertEquals(
            'navbar.housing.storage',
            $housingTypeExtension->getHousingType(new Storage()),
            'Should return: navbar.housing.storage'
        );

        $this->assertEquals(
            'navbar.housing.floor.urban',
            $housingTypeExtension->getHousingType(new UrbanFloor()),
            'Should return: navbar.housing.floor.urban'
        );

        $this->assertEquals(
            'navbar.housing.floor.non_urban',
            $housingTypeExtension->getHousingType(new NonUrbanFloor()),
            'Should return: navbar.housing.floor.non_urban'
        );

        $this->assertEquals(
            'housing',
            $housingTypeExtension->getHousingType(new Housing()),
            'Should return: housing'
        );
    }
}
