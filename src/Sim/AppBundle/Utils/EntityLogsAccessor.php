<?php

namespace Sim\AppBundle\Utils;

class EntityLogsAccessor extends BaseService
{
    public function findLogs($entity)
    {
        $em = $this->get('doctrine')->getManager();

        $repo = $em->getRepository('Gedmo\Loggable\Entity\LogEntry');

        $logs = $repo->getLogEntries($entity);

        return $logs;

    }
}