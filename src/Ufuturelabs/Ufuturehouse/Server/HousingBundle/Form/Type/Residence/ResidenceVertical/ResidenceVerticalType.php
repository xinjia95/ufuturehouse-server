<?php

namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Residence\ResidenceVertical;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Residence\ResidenceType;

class ResidenceVerticalType extends ResidenceType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('elevatorNumber')
            ->add('concierge')
            ->add('height', 'catalogue_height')
            ->add('doorwayStatus', 'catalogue_doorway_status')
            ->add('clothesLine', 'catalogue_clothes_line')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Residence\ResidenceVertical\ResidenceVertical',
            'translation_domain' => 'forms',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'residencevertical';
    }
}
