<?php

namespace Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LocationsBundle:Default:index.html.twig', array('name' => $name));
    }
}
