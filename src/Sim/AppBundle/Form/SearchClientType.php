<?php

namespace Sim\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SearchClientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name' , null , ['label' => 'label.client.name' , 'required' => false ])
            ->add('description' , null , ['label' => 'label.client.description' , 'required' => false ])
        ;

        $builder->add('save' , 'submit' , [ 'label' => 'label.client.search']);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'search_client';
    }
}
