<?php

namespace Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BankAccountType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('holder')
            ->add('bankAccountNumber')
            ->add('description')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ufuturelabs\Ufuturehouse\Server\PeopleBundle\Entity\BankAccount'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ufuturelabs_ufuturehouse_server_peoplebundle_bankaccount';
    }
}
