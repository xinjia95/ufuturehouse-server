<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HousingController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackendBundle:Housing:index.html.twig', array(
                // ...
            ));    }

    public function createAction()
    {
        return $this->render('BackendBundle:Housing:create.html.twig', array(
                // ...
            ));    }

    public function editAction()
    {
        return $this->render('BackendBundle:Housing:edit.html.twig', array(
                // ...
            ));    }

    public function deleteAction()
    {
        return $this->render('BackendBundle:Housing:delete.html.twig', array(
                // ...
            ));    }

    public function viewAction()
    {
        return $this->render('BackendBundle:Housing:view.html.twig', array(
                // ...
            ));    }

}
