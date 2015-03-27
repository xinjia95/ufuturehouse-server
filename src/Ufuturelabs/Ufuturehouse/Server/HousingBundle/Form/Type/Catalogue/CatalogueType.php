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
class CatalogueType extends AbstractType
{
    const CATALOGUE_NAMESPACE = 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\\';

    /** @var EntityManager $em */
    private $em;

    /** @var Catalogue $catalogue */
    private $catalogue;

    public function __construct(EntityManager $em, $catalogue)
    {
        $this->em = $em;
        $this->catalogue = $catalogue;
    }

    /** {@inheritdoc} */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $dql = 'SELECT c FROM HousingBundle:Catalogue\Catalogue c WHERE c INSTANCE OF '.$this->catalogue;
        $query = $this->em->createQuery($dql);
        $choices = $query->getArrayResult();

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
