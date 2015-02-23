<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompanyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('street')
            ->add('city')
            ->add('zipCode')
            ->add('state')
            ->add('telephone')
            ->add('fax', 'text', array(
                'required' => false,
            ))
            ->add('email')
            ->add('logo', 'file', array(
                'required' => false,
            ))
            ->add('facebook')
            ->add('twitter')
            ->add('googlePlus')
            ->add('googleMaps')
            ->add('tumblr')
            ->add('pinterest')
            ->add('flickr')
            ->add('youtube')
            ->add('linkedin')
            ->add('primaryColor')
            ->add('secundaryColor')
            ->add('submit', 'submit', array(
                'attr' => array(
                    'class' => 'btn-success',
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity\Company'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ufuturelabs_ufuturehouse_server_backendbundle_company';
    }
}
