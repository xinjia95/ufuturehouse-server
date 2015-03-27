<?php

namespace Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Coordinate;

class ZoneType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('city')
            ->add('coordinates', 'collection', array(
                'type' => new CoordinateType(),
                'by_reference' => false,
                'prototype' => new Coordinate(),
                'allow_add' => true,
                'allow_delete' => true,
                'attr' => array(
                    'class' => 'coordinates'
                ),
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\LocationsBundle\Entity\Zone',
            'translation_domain' => 'forms'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zone';
    }
}
