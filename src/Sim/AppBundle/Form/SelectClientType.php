<?php

namespace Sim\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SelectClientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('client' , 'entity' ,
                [
                    'label' => 'label.selectClient.list_of_client',
                    'class' => 'SimAppBundle:Client'
                ]
            )
        ;

        $builder->add('save' , 'submit' , ['label' => 'label.selectClient.select']);
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'select_project';
    }
}
