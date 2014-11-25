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
            ->add('name' , null , ['label' => '联系人称呼'])
            ->add('email' , null , ['label' => 'Email'])
            ->add('qq' , null , ['label' => 'QQ'])
            ->add('phone' , null , ['label' => '固定电话'])
            ->add('mobile' , null , ['label' => '手机'])
            ->add('fax' , null , ['label' => '传真'])
            ->add('weibo' , null , ['label' => '新浪微博'])
            ->add('twitter' , null , ['label' => 'Twitter'])
            ->add('facebook' , null , ['label' => 'Facebook'])
            ->add('linkedin' , null , ['label' => '领英网'])
            ->add('address' , null , ['label' => '地址'])
            ->add('blog' , null , ['label' => '博客'])
            ->add('website' , null , ['label' => '网站'])
            ->add('description' , null , ['label' => '联系方式描述'])
        ;

        $builder->add('save' , 'submit' , ['label' => '添加/更新联系方式']);
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
