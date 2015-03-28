<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Catalogue;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\Catalogue;

/**
 * Class CatalogueType
 * @package Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Catalogue
 * @since 1.0
 */
abstract class AbstractCatalogueType extends AbstractType
{
    /** @var EntityManager $em */
    protected $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /** {@inheritdoc} */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $choices = $this->em->getRepository('HousingBundle:Catalogue\Catalogue')->findAll();

        $resolver->setDefaults(array(
            'choices' => $choices,
        ));
    }

    /** {@inheritdoc} */
    public function getParent()
    {
        return 'choice';
    }

    /** {@inheritdoc} */
    public function getName()
    {
        return 'catalogue';
    }
}
