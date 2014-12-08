<?php

namespace Sim\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SearchProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('projectName' , null , ['label' => 'label.project.projectName','required' => false ])
            ->add('contactPayment' , null ,
                [
                    'label' => 'label.project.contactPayment' ,
                    'required' => false
                ]
            )
            ->add('description' , null ,
                [
                    'label'  => 'label.project.description' ,
                    'required' => false
                ]
            )
        ;

        $builder->add('save' , 'submit' , ['label' => 'label.project.search']);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'create_project';
    }
}
