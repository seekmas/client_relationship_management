<?php

namespace Sim\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchEventType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject' , null , ['label' => 'label.event.subject' , 'required' => false ])
            ->add('content' , null , ['label' => 'label.event.content' , 'required' => false ])
        ;

        $builder->add('save' , 'submit' , ['label' => 'label.event.search']);
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'search_event';
    }
}
