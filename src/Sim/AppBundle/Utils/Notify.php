<?php

namespace Sim\AppBundle\Utils;

class Notify extends BaseService
{
    public function note_expired_notify()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $note = $this->get('note');
        $note->createQueryBuilder('n')
             ->select('n')
             ->where('n.userId = :userId')
             ->setParameter('userId' , $user->getId())
            ->getQuery()
            ->getResult();


    }
}