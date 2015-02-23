<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\InvalidParameterException;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity\User;

class UsersController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var User[] $users */
        $users = $em->getRepository('BackendBundle:User')->findAll();

        return $this->render('BackendBundle:Users:index.html.twig', array(
            'users' => $users
        ));
    }

    /**
     * @param $id int
     * @return Response
     */
    public function viewAction($id)
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var User $user */
        $user = $em->getRepository('BackendBundle:User')->find($id);

        return $this->render('BackendBundle:Users:index.html.twig', array(
            'user' => $user
        ));
    }

    public function createAction()
    {
//        $person = new PhysicalPerson();
//
//        /** @var \Symfony\Component\HttpFoundation\Request $request */
//        $request = $this->container->get('request');
//
//        /** @var \Symfony\Component\Form\Form $form */
//        $form = $this->createForm(new PhysicalPersonType(), $person);
//        $form->handleRequest($request);
//
//        if ($form->isValid())
//        {
//            /** @var \Doctrine\Common\Persistence\ObjectManager $em */
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($person);
//            $em->flush();
//
//            return $this->redirectToRoute('backend_people_physical_index');
//        }
//        return $this->render("@Backend/People/Physical/create.html.twig", array(
//            "form" => $form->createView()
//        ));
    }

    /**
     * @param $id int
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editAction($id)
    {
//        /** @var \Symfony\Component\HttpFoundation\Request $request */
//        $request = $this->container->get('request');
//
//        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
//        $em = $this->getDoctrine()->getManager();
//
//        /** @var PhysicalPerson $person */
//        $person = $em->getRepository('PeopleBundle:PhysicalPerson')->find($id);
//
//        /** @var \Symfony\Component\Form\Form $form */
//        $form = $this->createForm(new PhysicalPersonType(), $person);
//        $form->handleRequest($request);
//
//        if ($form->isValid())
//        {
//            $em->persist($person);
//            $em->flush();
//
//            return $this->redirectToRoute('backend_people_physical_index');
//        }
//        return $this->render("@Backend/People/Physical/edit.html.twig", array(
//            "form" => $form->createView(),
//            "person" => $person
//        ));
    }

    /**
     * @param $id int
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id)
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var User $user */
        $user = $em->getRepository('BackendBundle:User')->find($id);

        $em->remove($user);
        $em->flush();

        $this->redirectToRoute('backend_users_index');
    }

    public function searchAction($filter, $param)
    {
        /** @var \FOS\UserBundle\Model\UserManager $userManager */
        $userManager = $this->container->get('fos_user.user_manager');

        $user = null;

        if ($filter == 'username')
        {
            $user = $userManager->findUserByUsername($param);
        }
        elseif ($filter == 'email')
        {
            $user = $userManager->findUserByEmail($param);
        }

        if (is_null($user))
        {
            $this->get('session')->getFlashBag()->add(
                'notice',
                'control_panel.users.search.not_found'
            );

            return $this->redirectToRoute('backend_users_index');
        }

        return $this->render('BackendBundle:Users:index.html.twig', array(
            'users' => array($user),
        ));
    }
}
