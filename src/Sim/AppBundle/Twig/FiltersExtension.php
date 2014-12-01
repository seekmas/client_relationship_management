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
        );
    }

    public function loggable($entity)
    {
        $em = $this->container->get('doctrine')->getManager();
        $repo = $em->getRepository('Gedmo\Loggable\Entity\LogEntry');
        $logs = $repo->getLogEntries($entity);
        return $logs;
    }

    public function getName()
    {
        return 'filters_extension';
    }
}