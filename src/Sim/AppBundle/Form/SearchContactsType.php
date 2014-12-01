<?php

namespace Sim\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SearchContactsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name' , null , ['label' => 'label.connect.name' , 'required' => false ])
            ->add('email' , null , ['label' => 'label.connect.email' , 'required' => false ])
            ->add('qq' , null , ['label' => 'label.connect.qq' , 'required' => false ])
            ->add('phone' , null , ['label' => 'label.connect.phone' , 'required' => false ])
            ->add('mobile' , null , ['label' => 'label.connect.mobile' , 'required' => false ])
            ->add('fax' , null , ['label' => 'label.connect.fax' , 'required' => false ])
            ->add('weibo' , null , ['label' => 'label.connect.weibo' , 'required' => false ])
            ->add('twitter' , null , ['label' => 'label.connect.twitter' , 'required' => false ])
            ->add('facebook' , null , ['label' => 'label.connect.facebook' , 'required' => false ])
            ->add('linkedin' , null , ['label' => 'label.connect.linkedin' , 'required' => false ])
            ->add('address' , null , ['label' => 'label.connect.address' , 'required' => false ])
            ->add('blog' , null , ['label' => 'label.connect.blog' , 'required' => false ])
            ->add('website' , null , ['label' => 'label.connect.website' , 'required' => false ])
            ->add('description' , null , ['label' => 'label.connect.description' , 'required' => false ])
        ;

        $builder->add('save' , 'submit' , ['label' => 'label.connect.search']);
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'search_contacts';
    }
}
