<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HousingBundle:Default:index.html.twig', array('name' => $name));
    }
}
