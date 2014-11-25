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
                'label' => '性别' ,
                'choices'   => array(1 => '男', 2 => '女'),
                'required'  => false,
            ])
            ->add('age' , null , ['label' => '年纪'])
            ->add('work' , null , ['label' => '工作'])
            ->add('education' , 'choice' , [
                'label' => '教育程度',
                'choices'   =>
                    [
                        '未知' => '未知',
                        '未接受教育' => '未接受教育',
                        '学前教育' => '学前教育',
                        '小学' => '小学',
                        '初高中' => '初高中',
                        '职专' => '职专' ,
                        '中技' => '中技' ,
                        '专科' => '专科',
                        '本科' => '本科',
                        '硕士研究生' => '硕士研究生' ,
                        '博士研究生' => '博士研究生' ,
                    ],
                'required'  => false,
            ])
            ->add('income' , null , ['label' => '收入'])
            ->add('value' , 'choice' ,
                [
                    'label' => '价值度',
                    'choices'   =>
                        [
                            '一般' => '一般',
                            '潜在' => '潜在' ,
                            '重要' => '重要' ,
                            '非常重要' => '非常重要' ,
                            '长期客户' => '长期客户' ,
                        ],
                    'required'  => false,
                ])
            ->add('relationship' , 'choice' ,
                [
                    'label' => '客户关系',
                    'choices'   =>
                        [

                            '竞争对手' => '竞争对手' ,
                            '潜在客户' => '潜在客户',
                            '培养中客户' => '培养中客户' ,
                            '需求不明确客户' => '需求不明确客户' ,
                            '需求明确客户' => '需求明确客户' ,
                            '合作中' => '合作中' ,
                            '合作终止' => '合作终止' ,
                            '合作完成' => '合作完成' ,
                        ],
                    'required'  => false,
                ])
        ;

        $builder->add('save' , 'submit' , ['label' => '更新属性']);
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
