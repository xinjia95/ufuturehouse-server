<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HousingController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackendBundle:Housing:index.html.twig');
    }

    public function createAction()
    {
        return $this->render('BackendBundle:Housing:create.html.twig');
    }

    public function editAction($id)
    {
        return $this->render('BackendBundle:Housing:edit.html.twig');
    }

    public function deleteAction($id)
    {
        return $this->redirect($this->generateUrl('backend_housing_index'));
    }

    public function viewAction($id)
    {
        return $this->render('BackendBundle:Housing:view.html.twig');
    }
}
