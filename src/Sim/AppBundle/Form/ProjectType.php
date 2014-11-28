<?php

namespace Sim\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('projectName' , null , ['label' => 'label.project.projectName'])
            ->add('signAt' , null ,
                [
                    'label' => 'label.project.signAt' ,
                    'widget' => 'single_text',
                    'datetimepicker' => true,
                ]
            )
            ->add('startAt' , null ,
                [
                    'label' => 'label.project.startAt' ,
                    'widget' => 'single_text',
                    'datetimepicker' => true,
                ]
            )
            ->add('endAt' , null ,
                [
                    'label' => 'label.project.endAt' ,
                    'widget' => 'single_text',
                    'datetimepicker' => true,
                ]
            )
            ->add('contactPayment' , null ,
                [
                    'label' => 'label.project.contactPayment' ,
                ]
            )
            ->add('description' , null ,
                [
                    'label'  => 'label.project.description'
                ]
            )
        ;


        $builder->add('save' , 'submit' , ['label' => 'label.project.save']);
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sim\AppBundle\Entity\Project'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'create_project';
    }
}
