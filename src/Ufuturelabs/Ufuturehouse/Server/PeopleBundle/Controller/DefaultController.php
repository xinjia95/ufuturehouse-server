<?php

namespace Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PeopleBundle:Default:index.html.twig', array('name' => $name));
    }
}
