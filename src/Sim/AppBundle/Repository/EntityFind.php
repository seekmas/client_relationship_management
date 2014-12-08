<?php

namespace Sim\AppBundle\Repository;

class EntityFind
{
    private $container;
    private $repo;

    public function __construct($container , $repo)
    {
        $this->container = $container;
        $this->repo = $repo;
    }

    public function findBy($where = [])
    {

        $where = array_filter($where);

        if(count($where) === 0)
        {
            return ;
        }

        $query = $this->repo->createQueryBuilder('repo')
                            ->select('repo');

        $_counter = 0;
        foreach($where as $key => $value)
        {
            if($_counter)
            {
                $query->orWhere('repo.'.$key.' like \'%'.$value.'%\'');

            }else
            {
                $query->where('repo.'.$key.' like \'%'.$value.'%\'');
                $_counter = 1;
            }
        }
        return $query->getQuery()->getResult();

    }
}