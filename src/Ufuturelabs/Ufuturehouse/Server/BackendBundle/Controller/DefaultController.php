<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackendBundle:Default:index.html.twig');
    }

    public function loginAction()
    {
        /** @var \Symfony\Component\Security\Http\Authentication\AuthenticationUtils $helper */
        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render('BackendBundle:Default:login.html.twig', array(
            'last_username' => $authenticationUtils->getLastUsername(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
        ));
    }
}
