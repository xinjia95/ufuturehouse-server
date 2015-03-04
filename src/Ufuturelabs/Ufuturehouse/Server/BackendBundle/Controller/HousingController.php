<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Flat;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Residence\ResidenceVertical\FlatType;

class HousingController extends Controller
{
    public function indexResidenceVerticalFlatAction()
    {
        return $this->render('BackendBundle:Housing/residence/vertical/flat:index.html.twig');
    }

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

            foreach ($flat->getImages() as $image)
            {
                if ($image->getImage() !== null)
                {

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

    public function editResidenceVerticalFlatAction($id)
    {
        return $this->render('BackendBundle:Housing/residence/vertical/flat:edit.html.twig');
    }

    public function deleteResidenceVerticalFlatAction($id)
    {
        return $this->redirect($this->generateUrl('backend_housing_residence_vertical_flat_index'));
    }

    public function viewResidenceVerticalFlatAction($id)
    {
        return $this->render('BackendBundle:Housing/residence/vertical/flat:view.html.twig');
    }
}
