<?php

namespace Sim\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FluentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject' , null , ['label' => '属性'])
            ->add('value' , null , ['label' => '值'])
        ;

        $builder->add('save' , 'submit' , ['label' => '添加/更新']);
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sim\AppBundle\Entity\Fluent'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sim_app_bundle_fluent';
    }
}
