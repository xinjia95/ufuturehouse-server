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
            /** @var \Ufuturelabs\Ufuturehouse\Server\BackendBundle\Util\Util $util */
            $util = $this->get('ufuturehouse.util');

            if ($company->getLogoPath() !== null && $company->getLogo() !== null)
            {
                $util->removeUploadedFile($util->getAbsoluteUploadImagesDir().'/'.$company->getLogoPath());
                $company->setLogoPath(null);
            }

            if ($company->getLogo() !== null)
            {
                $company->setLogoPath($util->generateFilename($company->getLogo()->getClientOriginalExtension()));
                $util->uploadFile($company->getLogo(), $util->getAbsoluteUploadImagesDir(), $company->getLogoPath());
                $util->generateFavicons($util->getAbsoluteUploadImagesDir().'/'.$company->getLogoPath(), $company->getLogo());
                $company->setLogo(null);
            }

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
