<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Residence;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\HousingType;

class ResidenceType extends HousingType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
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
            ->add('parkingSpacesPriceIncluded')
            ->add('parkingSpacesPrice')
            ->add('wardrobesNumber')
            ->add('dresser')
            ->add('boxroom')
            ->add('swimmingPool')
            ->add('consumptionRate')
            ->add('emissionsRate')
            ->add('securityDoor')
            ->add('kitchenType', 'catalogue_kitchen_type')
            ->add('parkingSpaceType', 'catalogue_parking_space_type')
            ->add('buildingType', 'catalogue_building_type')
            ->add('hotWaterType', 'catalogue_hot_water_type')
            ->add('airConditioningType', 'catalogue_air_conditioning_type')
            ->add('furnished', 'catalogue_furnished')
            ->add('gardenType', 'catalogue_garden_type')
            ->add('category', 'catalogue_housing_category')
            ->add('energyClass', 'catalogue_energy_class')
            ->add('emissionsClass', 'catalogue_emissions_class')
            ->add('heatingDistribution', 'catalogue_heating_distribution')
            ->add('heatingType', 'catalogue_heating_type')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\Residence',
            'translation_domain' => 'forms',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'residence';
    }
}
