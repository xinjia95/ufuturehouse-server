<?php

namespace Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CoordinateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('longitude', 'number')
            ->add('latitude', 'number')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Coordinate',
            'translation_domain' => 'forms'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'coordinate';
    }
}
