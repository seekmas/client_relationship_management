<?php

namespace Sim\AppBundle\Paginator;

class Paginator
{
    private $knp_paginator;
    private $container;

    public function __construct($knp_paginator , $container)
    {
        $this->knp_paginator = $knp_paginator;
        $this->container = $container;
    }

    public function get($repository)
    {
        $query = $repository->createQueryBuilder('repo')
                            ->select('repo')
                            ->orderBy('repo.id' , 'desc')
                            ->getQuery();
        $paginator  = $this->knp_paginator;
        return $pagination = $paginator->paginate(
                    $query,
                    $this->container->get('request')->query->get('page', 1) /*page number*/,
                    30
        );
    }


}