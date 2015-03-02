<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Residence\ResidenceVertical;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Image;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\ImageType;

class FlatType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', 'textarea')
            ->add('onSale', null, array(
                'required' => false,
            ))
            ->add('forRent', null, array(
                'required' => false,
            ))
            ->add('sold', null, array(
                'required' => false,
            ))
            ->add('rented', null, array(
                'required' => false,
            ))
            ->add('state')
            ->add('floorArea')
            ->add('rentableArea', null, array(
                'required' => false,
            ))
            ->add('usableArea', null, array(
                'required' => false,
            ))
            ->add('address')
            ->add('buildingYear')
            ->add('price', 'money')
            ->add('priceOffer', 'money', array(
                'required' => false,
            ))
            ->add('bankProperty', null, array(
                'required' => false,
            ))
            ->add('availabilityDate', null, array(
                'required' => false,
            ))
            ->add('luxuryProperty', null, array(
                'required' => false,
            ))
            ->add('orientation', null, array(
                'required' => false,
            ))
            ->add('outside', null, array(
                'required' => false,
            ))
            ->add('inside', null, array(
                'required' => false,
            ))
            ->add('locationState')
            ->add('city')
            ->add('zone')
            ->add('owners')
            ->add('bedroomsNumber')
            ->add('bathroomsNumber')
            ->add('toiletsNumber', null, array(
                'required' => false,
            ))
            ->add('sittingroomsNumber')
            ->add('kitchensNumber')
            ->add('terracesNumber')
            ->add('balconiesNumber')
            ->add('parkingSpacesNumber')
            ->add('sittingroomsArea', null, array(
                'required' => false,
            ))
            ->add('kitchensArea', null, array(
                'required' => false,
            ))
            ->add('terracesArea', null, array(
                'required' => false,
            ))
            ->add('balconiesArea', null, array(
                'required' => false,
            ))
            ->add('parkingSpacesArea', null, array(
                'required' => false,
            ))
            ->add('kitchenType', null, array(
                'required' => false,
            ))
            ->add('parkingSpaceType', null, array(
                'required' => false,
            ))
            ->add('height', null, array(
                'required' => false,
            ))
            ->add('parkingSpacesPriceIncluded', null, array(
                'required' => false,
            ))
            ->add('parkingSpacesPrice', 'money', array(
                'required' => false,
            ))
            ->add('buildingType', null, array(
                'required' => false,
            ))
            ->add('hotWaterType', null, array(
                'required' => false,
            ))
            ->add('airConditioningType', null, array(
                'required' => false,
            ))
            ->add('furnished', null, array(
                'required' => false,
            ))
            ->add('wardrobesNumber')
            ->add('dresser', null, array(
                'required' => false,
            ))
            ->add('boxroom', null, array(
                'required' => false,
            ))
            ->add('swimmingPool', null, array(
                'required' => false,
            ))
            ->add('gardenType', null, array(
                'required' => false,
            ))
            ->add('doorwayState', null, array(
                'required' => false,
            ))
            ->add('elevatorNumber')
            ->add('clothesLine', null, array(
                'required' => false,
            ))
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
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Flat',
            'translation_domain' => 'forms'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ufuturelabs_ufuturehouse_server_housingbundle_residence_residencevertical_flat';
    }
}
