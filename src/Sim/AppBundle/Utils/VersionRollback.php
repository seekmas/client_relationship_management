<?php

namespace Sim\AppBundle\Utils;

use Sim\AppBundle\Entity\Version;

class VersionRollback extends BaseService
{
    public function roll($entity , $v)
    {
        $objectClass = get_class($entity);
        $user = $this->get('security.context')->getToken()->getUser()->getUsername();

        $version = new Version();
        $version->setObjectClass($objectClass);
        $version->setObjectId($entity->getId());
        $version->setVersion($v);
        $version->setUsername($user);
        $version->setCreatedAt(new \Datetime());

        $em = $this->get('doctrine')->getManager();
        $em->persist($version);
        $em->flush();
    }

}