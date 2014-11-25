<?php

namespace Sim\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SelectProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('project' , 'entity' ,
                [
                    'class' => 'SimAppBundle:Project'
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
