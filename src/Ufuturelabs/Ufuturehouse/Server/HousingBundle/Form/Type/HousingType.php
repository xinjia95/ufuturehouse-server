<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Image;

class HousingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('onSale')
            ->add('forRent')
            ->add('sold')
            ->add('rented')
            ->add('conservationStatus', 'catalogue_conservation_status')
            ->add('floorArea')
            ->add('rentableArea')
            ->add('usableArea')
            ->add('address')
            ->add('buildingYear')
            ->add('price', 'money')
            ->add('priceOffer', 'money')
            ->add('bankProperty')
            ->add('availabilityDate', 'date', array(
                'required' => false,
            ))
            ->add('luxuryProperty')
            ->add('outside')
            ->add('inside')
            ->add('communityCharges', 'money')
            ->add('ibi', 'money')
            ->add('security')
            ->add('locationState')
            ->add('city')
            ->add('zone')
            ->add('orientation', 'catalogue_orientation')
            ->add('owners')
            ->add('images', 'collection', array(
                'type' => new ImageType(),
                'by_reference' => false,
                'prototype' => new Image(),
                'allow_add' => true,
                'allow_delete' => true,
                'attr' => array(
                    'class' => 'images'
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
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing',
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
