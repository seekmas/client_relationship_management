<?php

namespace Sim\AppBundle\Twig;

use Symfony\Component\DependencyInjection\Container;

class TranslationExtension extends \Twig_Extension
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('translate' , [$this , 'translate'] ),
            new \Twig_SimpleFilter('log_to_string' , [$this , 'log_to_string']) ,
            new \Twig_SimpleFilter('log_to_entity' , [$this , 'log_to_entity']) ,
            new \Twig_SimpleFilter('translate_to' , [$this , 'translate_to']) ,
        ];
    }

    public function translate($key)
    {
        $translator = $this->get('translator');

        $list = [
            'create' => $translator->trans('extension.translation.create') ,
            'update' => $translator->trans('extension.translation.update') ,
            'remove' => $translator->trans('extension.translation.remove') ,
            'Sim\AppBundle\Entity\Connect'  => $translator->trans('extension.translation.contacts') ,
            'Sim\AppBundle\Entity\Event'    => $translator->trans('extension.translation.event') ,
            'Sim\AppBundle\Entity\Project'  => $translator->trans('extension.translation.project') ,
            'Sim\AppBundle\Entity\Client'   => $translator->trans('extension.translation.client') ,
            'Sim\AppBundle\Entity\Fixed'    => $translator->trans('extension.translation.fixed_profile') ,
            'Sim\AppBundle\Entity\Fluent'   => $translator->trans('extension.translation.user_defined_profile') ,
        ];

        return $list[$key];
    }

    public function translate_to($translation)
    {
        $translator = $this->get('translator');
        return $translator->trans($translation);
    }

    public function log_to_string($object)
    {
        $em  = $this->get('doctrine')->getManager();

        //$filters = $em->getFilters();
        //$filters->disable('softdeleteable');

        $log = '';
        foreach ($object->getData() as $key => $value) {
            $log .= $key.'->'.$value.' ; ';
        }

        return $log;
    }

    public function log_to_entity($object)
    {
        $em  = $this->get('doctrine')->getManager();

        if($object->getAction() == 'remove')
        {
            $filters = $em->getFilters();
            $filters->disable('softdeleteable');
        }

        $repo = $em->getRepository($object->getObjectClass());
        $entity = $repo->find($object->getObjectId());

        if('create' == $object->getAction())
        {
            return '<a href="'.$this->map($object,$entity).'">'.$entity.'</a>';

        }elseif ('update' == $object->getAction())
        {
            return '<a href="'.$this->map($object,$entity).'">'.$entity.'</a>';

        }else if('remove' == $object->getAction())
        {

        }


        return $entity;
    }

    public function get($service)
    {
        return $this->container->get($service);
    }

    protected function map($object,$entity)
    {
        $class = $object->getObjectClass();
        $router = $this->container->get('router');

        if('Sim\AppBundle\Entity\Fluent' === $class)
        {
            if($entity->getProject())
            {
                return $router->generate('update_project_basic_info',
                    [
                        'project_id' => $entity->getProject()->getId() ,
                        'fluent_id'  => $entity->getId() ,
                    ]
                );
            }
            elseif($entity->getFixed())
            {
                return $router->generate('connect_fixed',
                    [
                        'connect_id' => $entity->getFixed()->getConnect()->getId() ,
                        'fluent_id'  => $entity->getId() ,
                    ]);
            }elseif($entity->getClient())
            {
                return $router->generate('update_client',
                    [
                        'client_id' => $entity->getClient()->getId() ,
                        'fluent_id' => $entity->getId()

                    ]
                );

            }
        }elseif('Sim\AppBundle\Entity\Fixed' === $class)
        {



        }elseif('Sim\AppBundle\Entity\Event' === $class)
        {
            return $router->generate('edit_project', ['project_id' => $entity->getProject()->getId()]);

        }elseif('Sim\AppBundle\Entity\Connect' === $class)
        {
            return $router->generate('connect_edit', ['connect_id' => $object->getObjectId()]);

        }elseif('Sim\AppBundle\Entity\Client' === $class)
        {

        }elseif('Sim\AppBundle\Entity\Project' === $class)
        {
            return $router->generate('edit_project', ['project_id' => $object->getObjectId()]);
        }
    }

    public function getName()
    {
        return 'translation_extension';
    }

}