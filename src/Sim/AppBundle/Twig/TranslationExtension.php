<?php

namespace Sim\AppBundle\Twig;


class TranslationExtension extends \Twig_Extension
{
    private $container;
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter( 'translate' , [$this , 'translate'] ),
            new \Twig_SimpleFilter('log_to_string' , [$this , 'log_to_string']) ,
        ];
    }

    public function translate($key)
    {
        $list = [
            'create' => '创建' ,
            'update' => '更新' ,
            'remove' => '删除' ,
            'Sim\AppBundle\Entity\Connect'  => '联系人' ,
            'Sim\AppBundle\Entity\Event'    => '事件' ,
            'Sim\AppBundle\Entity\Project'  => '项目' ,
            'Sim\AppBundle\Entity\Client'   => '客户' ,
            'Sim\AppBundle\Entity\Fluent'   => '资料' ,
        ];

        return $list[$key];
    }

    public function log_to_string($object)
    {
        $em  = $this->get('doctrine')->getManager();
        //$em->getFilters()->disable('soft-deleteable');
        $repo = $em->getRepository($object->getObjectClass());
        $entity = $repo->find($object->getObjectId());

        return $entity;
    }

    public function get($service)
    {
        return $this->container->get($service);
    }

    public function getName()
    {
        return 'translation_extension';
    }

}