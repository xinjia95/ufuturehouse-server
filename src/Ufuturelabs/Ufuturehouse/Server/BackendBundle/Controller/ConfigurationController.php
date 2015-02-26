<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity\Company;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Form\CompanyType;

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
}
