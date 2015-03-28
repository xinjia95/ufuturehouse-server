<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Catalogue;

use Doctrine\ORM\EntityManager;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrientationCatalogueType extends AbstractCatalogueType
{
    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
    }

    /** {@inheritdoc} */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $choices = $this->em->getRepository('HousingBundle:Catalogue\OrientationCatalogue')->findAll();

        $resolver->setDefaults(array(
            'choices' => $choices,
        ));
    }

    /** {@inheritdoc} */
    public function getParent()
    {
        return parent::getParent();
    }

    /** {@inheritdoc} */
    public function getName()
    {
        return parent::getName().'_orientation';
    }
}
