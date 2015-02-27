<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('enabled', null, array(
                'required' => false,
            ))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'required' => false,
            ))
            ->add('locked', null, array(
                'required' => false,
            ))
            ->add('roles', 'choice', array(
                'choices' => array(
                    'ROLE_USER'        => 'User',
                    'ROLE_ADMIN'       => 'Admin',
                    'ROLE_SUPER_ADMIN' => 'Super Admin',
                ),
                'multiple' => true,
            ))
            ->add('name')
            ->add('surname', null, array(
                'required' => false,
            ))
            ->add('telephone', null, array(
                'required' => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity\User',
            'translation_domain' => 'forms'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ufuturelabs_ufuturehouse_server_backendbundle_user';
    }
}
