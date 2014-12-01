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

    public function get($repository , $where = [] , $orderBy = [] , $per_row = 30)
    {
        $query = $repository->createQueryBuilder('repo')
                            ->select('repo');

        $_counter = 0;
        foreach($where as $key => $value)
        {
            if($_counter)
            {
                $query->AndWhere('repo.'.$key.'='.$value);
            }else
            {
                $query->where('repo.'.$key.'='.$value);
            }
            $_counter = 1;
        }

        $_counter = 0;
        foreach($orderBy as $key => $value)
        {
            $_counter = 1;
            $query->orderBy('repo.'.$key , $value);
        }

        if($_counter == 0)
        {
            $query->orderBy('repo.id' , 'desc');
        }

        $query->getQuery();
        $paginator  = $this->knp_paginator;
        return $pagination = $paginator->paginate(
                    $query,
                    $this->container->get('request')->query->get('page', 1) /*page number*/,
                    $per_row
        );
    }


}