<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\LegalPerson;
use Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Person;
use Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\PhysicalPerson;
use Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Form\LegalPersonType;
use Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Form\PhysicalPersonType;

class PeopleController extends Controller
{
    public function indexPhysicalAction()
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var PhysicalPerson[] $person */
        $people = $em->getRepository('PeopleBundle:PhysicalPerson')->findAll();

        return $this->render('BackendBundle:People:Physical/index.html.twig', array(
            'people' => $people,
        ));
    }

    /**
     * @param $id int
     * @return Response
     */
    public function viewPhysicalAction($id)
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var PhysicalPerson $person */
        $person = $em->getRepository('PeopleBundle:PhysicalPerson')->find($id);

        return $this->render('BackendBundle:People:Physical/view.html.twig', array(
            'person' => $person
        ));
    }

    public function createPhysicalAction()
    {
        $person = new PhysicalPerson();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new PhysicalPersonType(), $person);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            /** @var \Doctrine\Common\Persistence\ObjectManager $em */
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();

            return $this->redirectToRoute('backend_people_physical_index');
        }
        return $this->render("@Backend/People/Physical/create.html.twig", array(
            "form" => $form->createView()
        ));
    }

    /**
     * @param $id int
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editPhysicalAction($id)
    {
        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var PhysicalPerson $person */
        $person = $em->getRepository('PeopleBundle:PhysicalPerson')->find($id);

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new PhysicalPersonType(), $person);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em->persist($person);
            $em->flush();

            return $this->redirectToRoute('backend_people_physical_index');
        }
        return $this->render("@Backend/People/Physical/edit.html.twig", array(
            "form" => $form->createView(),
            "person" => $person
        ));
    }

    public function indexLegalAction()
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var LegalPerson[] $person */
        $people = $em->getRepository('PeopleBundle:LegalPerson')->findAll();

        return $this->render('BackendBundle:People:Legal/index.html.twig', array(
            'people' => $people,
        ));
    }

    /**
     * @param $id int
     * @return Response
     */
    public function viewLegalAction($id)
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var LegalPerson $person */
        $person = $em->getRepository('PeopleBundle:LegalPerson')->find($id);

        return $this->render('BackendBundle:People:Legal/view.html.twig', array(
            'person' => $person
        ));
    }

    public function createLegalAction()
    {
        $person = new LegalPerson();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new LegalPersonType(), $person);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            /** @var \Doctrine\Common\Persistence\ObjectManager $em */
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();

            return $this->redirectToRoute('backend_people_legal_index');
        }
        return $this->render("@Backend/People/Legal/create.html.twig", array(
            "form" => $form->createView()
        ));
    }

    public function editLegalAction($id)
    {
        return $this->redirectToRoute('backend_people_legal_index');
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id)
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Person $person */
        $person = $em->getRepository('PeopleBundle:Person')->find($id);

        $em->remove($person);
        $em->flush();

        $this->redirectToRoute((($person instanceof PhysicalPerson) ? 'backend_people_physical_index_index' : 'backend_people_physical_legal_index'));
    }

}
