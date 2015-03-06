<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Controller;

use Ivory\GoogleMap\Overlays\Animation;
use Ivory\GoogleMap\Overlays\Marker;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Flat;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Residence\ResidenceVertical\FlatType;

class HousingController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexResidenceVerticalFlatAction()
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        $flats = $em->getRepository('HousingBundle:Residence\ResidenceVertical\Flat')->findAll();

        return $this->render('BackendBundle:Housing:index.html.twig', array(
            'housings' => $flats,
            'routes' => 'backend_housing_residence_vertical_flat_',
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createResidenceVerticalFlatAction()
    {
        $flat = new Flat();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new FlatType(), $flat);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            /** @var \Doctrine\Common\Persistence\ObjectManager $em */
            $em = $this->getDoctrine()->getManager();

            /** @var \Ufuturelabs\Ufuturehouse\Server\BackendBundle\Util\Util $util */
            $util = $this->get('ufuturehouse.util');

            foreach ($flat->getImages() as $image)
            {
                if ($image->getImage() !== null)
                {
                    $image->setPath($util->generateFilename($image->getImage()->getClientOriginalExtension()));
                    $util->uploadFile($image->getImage(), $util->getAbsoluteUploadImagesDir(), $image->getPath());
                    $image->setImage(null);
                }
            }

            $em->persist($flat);
            $em->flush();

            return $this->redirectToRoute('backend_housing_residence_vertical_flat_index');
        }
        return $this->render("BackendBundle:Housing/residence/vertical/flat:create.html.twig", array(
            "form" => $form->createView()
        ));
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editResidenceVerticalFlatAction($id)
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Flat $flat */
        $flat = $em->getRepository('HousingBundle:Residence\ResidenceVertical\Flat')->find($id);

        if (!$flat)
        {
            throw $this->createNotFoundException('Unable to find this flat');
        }

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new FlatType(), $flat);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            /** @var \Ufuturelabs\Ufuturehouse\Server\BackendBundle\Util\Util $util */
            $util = $this->get('ufuturehouse.util');

            $locale = $this->container->getParameter('locale');

            $housingType = $this->get('translator')->trans(
                $this->container->get('twig.extension.housing.get_type')->getHousingType($flat),
                null,
                null,
                $locale
            );

            if ($flat->isOnSale() && $flat->isForRent())
            {
                $housingStatus = 'backend.housing.on_sale_rent';
            }
            elseif ($flat->isOnSale())
            {
                $housingStatus = 'backend.housing.on_sale';
            }
            elseif ($flat->isForRent())
            {
                $housingStatus = 'backend.housing.for_rent';
            }
            else
            {
                $housingStatus = '';
            }

            $slug = $housingType.' '.$housingStatus.' '.$flat->getCity().' '.$flat->getZone().' '.$flat->getFloorArea().'m2 '.$flat->getPrice().' '.sha1(uniqid(mt_rand(), true));

            $flat->setSlug($this->get('slugify')->slugify($slug));

            foreach ($flat->getImages() as $image)
            {
                if ($image->getId() === null && $image->getImage() !== null)
                {
                    $image->setPath($util->generateFilename($image->getImage()->getClientOriginalExtension()));
                    $util->uploadFile($image->getImage(), $util->getAbsoluteUploadImagesDir(), $image->getPath());
                    $image->setImage(null);
                }
            }

            $em->persist($flat);
            $em->flush();

            return $this->redirectToRoute('backend_housing_residence_vertical_flat_view', array('id' => $flat->getId()));
        }
        return $this->render("BackendBundle:Housing/residence/vertical/flat:edit.html.twig", array(
            "form" => $form->createView()
        ));
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewResidenceVerticalFlatAction($id)
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Flat $flat */
        $flat = $em->getRepository('HousingBundle:Residence\ResidenceVertical\Flat')->find($id);

        if (!$flat)
        {
            throw $this->createNotFoundException('Unable to find this flat');
        }

        $map = $this->get('ivory_google_map.map');

        $marker = new Marker();
        $marker->setPrefixJavascriptVariable('marker_');
        $marker->setPosition(40.488132, -3.364704, true);
        $marker->setAnimation(Animation::DROP);
        $marker->setOptions(array(
            'clickable' => false,
            'flat'      => true,
        ));

        $map->setCenter(40.488132, -3.364704, true);
        $map->setMapOption('zoom', 17);
        $map->setLanguage($this->container->getParameter('locale'));
        $map->addMarker($marker);

        return $this->render('BackendBundle:Housing/residence/vertical/flat:view.html.twig', array(
            'housing' => $flat,
            'routes' => 'backend_housing_residence_vertical_flat_',
            'map' => $map,
        ));
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id)
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        $housing = $em->getRepository('HousingBundle:Housing')->find($id);

        if (!$housing)
        {
            throw $this->createNotFoundException('Unable to find this housing');
        }

        $em->remove($housing);
        $em->flush();

        return $this->redirect($this->generateUrl('backend_index'));
    }
}
