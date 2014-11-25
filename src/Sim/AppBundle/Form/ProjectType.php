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
            ->add('projectName' , null , ['label' => '项目名'])
            ->add('signAt' , null ,
                [
                    'label' => '合同日期' ,
                    'widget' => 'single_text',
                    'datetimepicker' => true,
                ]
            )
            ->add('startAt' , null ,
                [
                    'label' => '项目开始日期' ,
                    'widget' => 'single_text',
                    'datetimepicker' => true,
                ]
            )
            ->add('endAt' , null ,
                [
                    'label' => '项目完成日期' ,
                    'widget' => 'single_text',
                    'datetimepicker' => true,
                ]
            )
            ->add('contactPayment' , null ,
                [
                    'label' => '合同金额' ,
                ]
            )
            ->add('description' , null ,
                [
                    'label'  => '合同描述'
                ]
            )
        ;


        $builder->add('save' , 'submit' , ['label' => '创建/更新项目']);
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
