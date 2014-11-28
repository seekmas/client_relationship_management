<?php

namespace Sim\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConnectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name' , null , ['label' => 'label.connect.name'])
            ->add('email' , null , ['label' => 'label.connect.email'])
            ->add('qq' , null , ['label' => 'label.connect.qq'])
            ->add('phone' , null , ['label' => 'label.connect.phone'])
            ->add('mobile' , null , ['label' => 'label.connect.mobile'])
            ->add('fax' , null , ['label' => 'label.connect.fax'])
            ->add('weibo' , null , ['label' => 'label.connect.weibo'])
            ->add('twitter' , null , ['label' => 'label.connect.twitter'])
            ->add('facebook' , null , ['label' => 'label.connect.facebook'])
            ->add('linkedin' , null , ['label' => 'label.connect.linkedin'])
            ->add('address' , null , ['label' => 'label.connect.address'])
            ->add('blog' , null , ['label' => 'label.connect.blog'])
            ->add('website' , null , ['label' => 'label.connect.website'])
            ->add('description' , null , ['label' => 'label.connect.description'])
        ;

        $builder->add('save' , 'submit' , ['label' => 'label.connect.save']);
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sim\AppBundle\Entity\Connect'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sim_appbundle_connect';
    }
}
