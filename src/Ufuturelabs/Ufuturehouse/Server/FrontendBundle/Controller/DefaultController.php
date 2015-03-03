<?php

namespace Ufuturelabs\Ufuturehouse\Server\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing;

class DefaultController extends Controller
{
    public function indexAction()
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Housing[] $housings */
        $housings = $em->getRepository('HousingBundle:Housing')->findLast(12);

        return $this->render('FrontendBundle:Default:index.html.twig', array(
            'housings' => $housings,
        ));
    }
}
