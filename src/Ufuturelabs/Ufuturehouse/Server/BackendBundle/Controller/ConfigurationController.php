<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity\Company;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Form\Type\CompanyType;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Form\Type\UserProfileType;

class ConfigurationController extends Controller
{
    public function indexAction()
    {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
            throw $this->createAccessDeniedException();

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Company $company */
        $company = $em->getRepository('BackendBundle:Company')->findAll()[0];

        $form = $this->createForm(new CompanyType(), $company);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em->persist($company);
            $em->flush();
        }

        return $this->render('BackendBundle:Configuration:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function profileAction()
    {
        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $this->container->get('request');

        /** @var \FOS\UserBundle\Model\UserManager $userManager */
        $userManager = $this->container->get('fos_user.user_manager');

        /** @var string $username */
        $username = $this->getUser()->getUsername();

        $user = $userManager->findUserByUsername($username);

        $form = $this->createForm(new UserProfileType(), $user);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $userManager->updateUser($user);
        }

        return $this->render('BackendBundle:Configuration:profile.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
