<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Twig;

use Doctrine\ORM\EntityManager;
use Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity\Company;

class CompanyExtension extends \Twig_Extension
{
    /** @var  Company */
    private $company;

    public function __construct(EntityManager $em)
    {
        $this->company = $em->getRepository('BackendBundle:Company')->findAll()[0];
    }

    public function getName()
    {
        return 'company_extension';
    }

    public function getGlobals()
    {
        return array('company' => $this->company);
    }

    public function getCompanyFilter()
    {
        return $this->company;
    }
}
