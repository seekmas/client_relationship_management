<?php

namespace Sim\AppBundle\Twig;

use Symfony\Component\DependencyInjection\Container;

class FiltersExtension extends \Twig_Extension
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return array(
            'loggable' => new \Twig_Filter_Method($this, 'loggable'),
            'exist' => new \Twig_Filter_Method($this, 'exist')
        );
    }

    public function getFunctions()
    {
        return array(
            'get_type'  => new \Twig_Function_Method($this, 'get_type'),
        );
    }

    function get_type($object)
    {
        return gettype($object);
    }

    public function loggable($entity)
    {
        $em = $this->container->get('doctrine')->getManager();
        $repo = $em->getRepository('Gedmo\Loggable\Entity\LogEntry');
        $logs = $repo->getLogEntries($entity);
        return $logs;
    }

    public function exist($variable , $key)
    {
        if( is_array($variable) && array_key_exists($key , $variable))
        {
            return $variable[$key];
        }
        else
        {
            return false;
        }
    }

    public function getName()
    {
        return 'filters_extension';
    }
}