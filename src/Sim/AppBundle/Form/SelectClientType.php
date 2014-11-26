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
                    'label' => '客户列表',
                    'class' => 'SimAppBundle:Client'
                ]
            )
        ;

        $builder->add('save' , 'submit' , ['label' => '选择']);
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'select_project';
    }
}
