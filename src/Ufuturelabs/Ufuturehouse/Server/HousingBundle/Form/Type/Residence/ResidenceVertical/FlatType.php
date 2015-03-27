<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Residence\ResidenceVertical;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FlatType extends ResidenceVerticalType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Flat',
            'translation_domain' => 'forms',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'housing';
    }
}
