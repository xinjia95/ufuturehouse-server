<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Residence\ResidenceVertical;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FlatType extends AbstractType
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
            ->add('price', 'money')
            ->add('priceOffer', 'money')
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
            ->add('bedroomsNumber')
            ->add('bathroomsNumber')
            ->add('toiletsNumber')
            ->add('sittingroomsNumber')
            ->add('kitchensNumber')
            ->add('terracesNumber')
            ->add('balconiesNumber')
            ->add('parkingSpacesNumber')
            ->add('sittingroomsArea')
            ->add('kitchensArea')
            ->add('terracesArea')
            ->add('balconiesArea')
            ->add('parkingSpacesArea')
            ->add('kitchenType')
            ->add('parkingSpaceType')
            ->add('height')
            ->add('parkingSpacesPriceIncluded')
            ->add('parkingSpacesPrice', 'money')
            ->add('buildingType')
            ->add('hotWaterType')
            ->add('airConditioningType')
            ->add('furnished')
            ->add('wardrobesNumber')
            ->add('dresser')
            ->add('boxroom')
            ->add('swimmingPool')
            ->add('gardenType')
            ->add('doorwayState')
            ->add('elevatorNumber')
            ->add('clothesLine')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\Flat'
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
