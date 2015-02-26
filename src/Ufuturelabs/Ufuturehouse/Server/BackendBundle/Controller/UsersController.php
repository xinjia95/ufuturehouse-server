<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\InvalidParameterException;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity\User;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Form\UserType;

class UsersController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
            throw $this->createAccessDeniedException();

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
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
            throw $this->createAccessDeniedException();

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
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
            throw $this->createAccessDeniedException();

        /** @var \FOS\UserBundle\Model\UserManager $userManager */
        $userManager = $this->container->get('fos_user.user_manager');

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        $user = $userManager->createUser();

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $user->setPlainPassword($form->getData()->getPassword());
            $user->setPassword(null);

            $userManager->updateUser($user);

            return $this->redirectToRoute('backend_users_index');
        }
        return $this->render("@Backend/Users/create.html.twig", array(
            "form" => $form->createView()
        ));
    }

    /**
     * @param $username string
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editAction($username)
    {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
            throw $this->createAccessDeniedException();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \FOS\UserBundle\Model\UserManager $userManager */
        $userManager = $this->container->get('fos_user.user_manager');

        $user = $userManager->findUserByUsername($username);

        $lastPassword = $user->getPassword();

        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            if ($user->getPassword() != $lastPassword)
            {
                $user->setPassword($lastPassword);
            }
            else
            {
                $user->setPlainPassword($form->getData()->getPassword());
                $user->setPassword(null);
            }

            $userManager->updateUser($user);

            return $this->redirectToRoute('backend_users_index');
        }
        return $this->render("@Backend/Users/edit.html.twig", array(
            "form" => $form->createView(),
        ));
    }

    /**
     * @param $id int
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id)
    {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
            throw $this->createAccessDeniedException();

        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var User $user */
        $user = $em->getRepository('BackendBundle:User')->find($id);

        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('backend_users_index');
    }

    public function searchAction($filter, $param)
    {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
            throw $this->createAccessDeniedException();

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
