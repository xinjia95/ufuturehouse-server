<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Tests\Twig;

use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Twig\BackendExtension;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Flat;

class BackendExtensionTest extends \PHPUnit_Framework_TestCase
{
    /** @var  BackendExtension */
    private $backendExtension;

    public function __construct()
    {
        $this->backendExtension = new BackendExtension();
    }

    public function testGetName()
    {
        $this->assertEquals('get_housing_route_prefix', $this->backendExtension->getName());
    }

    public function testGetHousingRoutePrefix()
    {
        $this->assertEquals(
            'backend_housing_residence_vertical_flat_',
            $this->backendExtension->getHousingRoutePrefix(new Flat())
        );
        // TODO More tests when routes are made
    }

    public function testGetFunctions()
    {
        $this->assertNotNull(
            array(
                new \Twig_SimpleFunction($this->getName(), array($this, 'getHousingRoutePrefix')),
            ),
            $this->backendExtension->getFunctions()
        );
    }
}
