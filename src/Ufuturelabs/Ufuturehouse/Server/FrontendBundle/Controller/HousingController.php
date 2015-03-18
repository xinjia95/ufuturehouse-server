<?php

namespace Ufuturelabs\Ufuturehouse\Server\FrontendBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HousingController extends Controller
{
    public function indexAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('SELECT h FROM HousingBundle:Housing h');

        $housings = $this->get('knp_paginator')->paginate(
            $query->,
            $this->get('request')->get('page', 1),
            10
        );

        return $this->render('@Frontend/Housing/index.html.twig', array(
            'housings' => $housings,
        ));
    }

    public function viewAction($slug, $id)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        return $this->render('');
    }
}