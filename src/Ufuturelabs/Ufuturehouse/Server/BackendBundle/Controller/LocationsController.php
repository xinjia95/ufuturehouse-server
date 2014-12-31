<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\City;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Province;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Zone;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Form\CityType;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Form\ProvinceType;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Form\ZoneType;

class LocationsController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexProvinceAction()
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $provinces = $em->getRepository('LocationsBundle:Province')->findAll();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        $province = new Province();

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new ProvinceType(), $province, array(
            'action' => $this->generateUrl('backend_locations_province_create'),
            'method' => 'POST'
        ));
        $form->handleRequest($request);

        return $this->render('BackendBundle:Locations:Province/index.html.twig', array(
            'provinces' => $provinces,
            'form' => $form->createView(),
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createProvinceAction()
    {
        $province = new Province();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new ProvinceType(), $province);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            /** @var \Doctrine\Common\Persistence\ObjectManager $em */
            $em = $this->getDoctrine()->getManager();
            $em->persist($province);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backend_locations_province_index'));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteProvinceAction($id)
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Province $province */
        $province = $em->getRepository('LocationsBundle:Province')->find($id);

        $em->remove($province);
        $em->flush();

        return $this->redirect($this->generateUrl('backend_locations_province_index'));
    }

    public function indexCityAction()
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $cities = $em->getRepository('LocationsBundle:City')->findAll();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        $city = new City();

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new CityType(), $city, array(
            'action' => $this->generateUrl('backend_locations_city_create'),
            'method' => 'POST'
        ));
        $form->handleRequest($request);

        return $this->render('BackendBundle:Locations:City/index.html.twig', array(
            'cities' => $cities,
            'form' => $form->createView(),
        ));
    }

    public function createCityAction()
    {
        $city = new City();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new CityType(), $city);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            /** @var \Doctrine\Common\Persistence\ObjectManager $em */
            $em = $this->getDoctrine()->getManager();
            $em->persist($city);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backend_locations_city_index'));
    }

    public function deleteCityAction($id)
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var City $city */
        $city = $em->getRepository('LocationsBundle:City')->find($id);

        $em->remove($city);
        $em->flush();

        return $this->redirect($this->generateUrl('backend_locations_city_index'));
    }

    public function indexZoneAction()
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $zones = $em->getRepository('LocationsBundle:Zone')->findAll();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        $zone = new Zone();

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new ZoneType(), $zone, array(
            'action' => $this->generateUrl('backend_locations_zone_create'),
            'method' => 'POST'
        ));
        $form->handleRequest($request);

        return $this->render('BackendBundle:Locations:Zone/index.html.twig', array(
            'zones' => $zones,
            'form' => $form->createView(),
        ));
    }

    public function createZoneAction()
    {
        $zone = new Zone();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new ZoneType(), $zone);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            /** @var \Doctrine\Common\Persistence\ObjectManager $em */
            $em = $this->getDoctrine()->getManager();
            $em->persist($zone);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backend_locations_zone_index'));
    }

    public function deleteZoneAction($id)
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Zone $zone */
        $zone = $em->getRepository('LocationsBundle:Zone')->find($id);

        $em->remove($zone);
        $em->flush();

        return $this->redirect($this->generateUrl('backend_locations_zone_index'));
    }
}
