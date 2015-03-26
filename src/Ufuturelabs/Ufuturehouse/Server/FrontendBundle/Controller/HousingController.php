<?php

namespace Ufuturelabs\Ufuturehouse\Server\FrontendBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;

class HousingController extends Controller
{
    public function indexAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('SELECT h FROM HousingBundle:Housing h');

        $housings = $this->get('knp_paginator')->paginate(
            $query,
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

        /** @var Housing $housing */
        $housing = $em->getRepository('HousingBundle:Housing')->find(array(
            'slug' => $slug,
            'id' => $id,
        ));

        $map = $this->get('ivory_google_map.map');
        $map->setMapOption('zoom', 17);
        $map->setStylesheetOption('width', "100%");
        $map->setStylesheetOption('heigth', "100%");

        if (!is_null($housing->getZone()))
        {
            $coordinates = $housing->getZone()->getCoordinates();
        }
        else
        {
            $coordinates = $housing->getCity()->getCoordinates();
        }

        $polygon = $this->get('ivory_google_map.polygon');

        foreach ($coordinates as $coordinate)
        {
            $polygon->addCoordinate($coordinate->getLatitude(), $coordinate->getLongitude(), true);
        }

        $map->addPolygon($polygon);

        return $this->render('@Frontend/Housing/view.html.twig', array(
            'housing' => $housing,
            'map' => $map,
        ));
    }
}
