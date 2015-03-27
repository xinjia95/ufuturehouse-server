<?php

namespace Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Address;
use Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\BankAccount;
use Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Email;
use Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\Phonenumber;

class PhysicalPersonType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dni')
            ->add('firstname')
            ->add('surname')
            ->add('secondSurname')
            ->add('birthday', 'birthday')
            ->add('emails', 'collection', array(
                'type' => new EmailType(),
                'by_reference' => false,
                'prototype' => new Email(),
                'allow_add' => true,
                'allow_delete' => true,
                'attr' => array(
                    'class' => 'emails'
                ),
            ))
            ->add('phonenumbers', 'collection', array(
                'type' => new PhonenumberType(),
                'by_reference' => false,
                'prototype' => new Phonenumber(),
                'allow_add' => true,
                'allow_delete' => true,
                'attr' => array(
                    'class' => 'phonenumbers'
                ),
            ))
            ->add('addresses', 'collection', array(
                'type' => new AddressType(),
                'by_reference' => false,
                'prototype' => new Address(),
                'allow_add' => true,
                'allow_delete' => true,
                'attr' => array(
                    'class' => 'addresses'
                ),
            ))
            ->add('bankAccounts', 'collection', array(
                'type' => new BankAccountType(),
                'by_reference' => false,
                'prototype' => new BankAccount(),
                'allow_add' => true,
                'allow_delete' => true,
                'attr' => array(
                    'class' => 'bankAccounts'
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
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\PhysicalPerson',
            'translation_domain' => 'forms'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'people_physicalperson';
    }
}
