<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;

class DefaultController extends Controller
{
    public function indexAction()
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Housing[] $housings */
        $housings = $em->getRepository('HousingBundle:Housing')->findLast(5);

        return $this->render('BackendBundle:Default:index.html.twig', array(
            'housings' => $housings,
        ));
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
