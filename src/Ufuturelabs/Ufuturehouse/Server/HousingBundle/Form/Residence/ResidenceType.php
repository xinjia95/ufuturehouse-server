<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Residence;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResidenceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
            ->add('parkingSpacesPrice')
            ->add('buildingType')
            ->add('hotWaterType')
            ->add('airConditioningType')
            ->add('furnished')
            ->add('wardrobesNumber')
            ->add('dresser')
            ->add('boxroom')
            ->add('swimmingPool')
            ->add('gardenType')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\Residence'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ufuturelabs_ufuturehouse_server_housingbundle_residence_residence';
    }
}
