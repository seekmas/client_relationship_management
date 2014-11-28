<?php

namespace Sim\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FixedType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender' , 'choice' , [
                'label' => 'label.fixed.gender.name' ,
                'choices'   => array(1 => 'label.fixed.gender.male', 2 => 'label.fixed.gender.female'),
                'required'  => false,
            ])
            ->add('age' , null , ['label' => 'label.fixed.age'])
            ->add('work' , null , ['label' => 'label.fixed.work'])
            ->add('education' , 'choice' , [
                'label' => 'label.fixed.education.name',
                'choices'   =>
                    [
                        'label.fixed.education.unknown' => 'label.fixed.education.unknown',
                        'label.fixed.education.uneducated' => 'label.fixed.education.uneducated',
                        'label.fixed.education.preschool' => 'label.fixed.education.preschool',
                        'label.fixed.education.primary_school' => 'label.fixed.education.primary_school',
                        'label.fixed.education.junior_senior' => 'label.fixed.education.junior_senior',
                        'label.fixed.education.college' => 'label.fixed.education.college',
                        'label.fixed.education.university' => 'label.fixed.education.university',
                        'label.fixed.education.master' => 'label.fixed.education.master' ,
                        'label.fixed.education.phd' => 'label.fixed.education.phd' ,
                    ],
                'required'  => false,
            ])
            ->add('income' , null , ['label' => 'label.fixed.income'])
            ->add('value' , 'choice' ,
                [
                    'label' => 'label.fixed.value.name',
                    'choices'   =>
                        [
                            'label.fixed.value.general' => 'label.fixed.value.general',
                            'label.fixed.value.potential' => 'label.fixed.value.potential' ,
                            'label.fixed.value.important' => 'label.fixed.value.important' ,
                            'label.fixed.value.vip' => 'label.fixed.value.vip' ,
                            'label.fixed.value.long_term' => 'label.fixed.value.long_term' ,
                        ],
                    'required'  => false,
                ])
            ->add('relationship' , 'choice' ,
                [
                    'label' => 'label.fixed.relationship.name',
                    'choices'   =>
                        [
                            'label.fixed.relationship.empty' => 'label.fixed.relationship.empty' ,
                            'label.fixed.relationship.requirement_not_clear' => 'label.fixed.relationship.requirement_not_clear' ,
                            'label.fixed.relationship.requirement_clear' => 'label.fixed.relationship.requirement_clear' ,
                            'label.fixed.relationship.in_cooperation' => 'label.fixed.relationship.in_cooperation' ,
                            'label.fixed.relationship.terminate' => 'label.fixed.relationship.terminate' ,
                            'label.fixed.relationship.finish' => 'label.fixed.relationship.finish' ,
                        ],
                    'required'  => false,
                ])
        ;

        $builder->add('save' , 'submit' , ['label' => 'label.fixed.save']);
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sim\AppBundle\Entity\Fixed'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sim_appbundle_fixed';
    }
}
