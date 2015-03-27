<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array(
                'read_only' => true,
            ))
            ->add('email')
            ->add('password', 'repeated', array(
                'type' => 'password',
                'required' => false,
            ))
            ->add('name', null, array(
                'read_only' => true,
            ))
            ->add('surname', null, array(
                'read_only' => true,
            ))
            ->add('telephone', null, array(
                'required' => false,
            ))
            ->add('update', 'submit', array(
                'attr' => array(
                    'class' => 'btn-warning',
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
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\BackendBundle\Entity\User',
            'translation_domain' => 'forms'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }
}
