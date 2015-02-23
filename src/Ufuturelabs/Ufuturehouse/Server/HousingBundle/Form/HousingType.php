<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
            ->add('state')
            ->add('floorArea')
            ->add('rentableArea')
            ->add('usableArea')
            ->add('address')
            ->add('buildingYear')
            ->add('price')
            ->add('priceOffer')
            ->add('bankProperty')
            ->add('availabilityDate')
            ->add('luxuryProperty')
            ->add('orientation')
            ->add('outside')
            ->add('inside')
            ->add('locationState')
            ->add('city')
            ->add('zone')
            ->add('owners')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Housing'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ufuturelabs_ufuturehouse_server_housingbundle_housing';
    }
}
