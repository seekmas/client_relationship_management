<?php

namespace Sim\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HistoryController extends Controller
{
    /**
     * @Route("/{project_id}/project" , name="history_of_project")
     * @Template()
     */
    public function projectAction(Request $request , $project_id)
    {

        $project = $this->get('project')->find($project_id);

        $objectClass = get_class($project);
        $objectId = $project_id;

        $version_rollback = $this->get('version')
                                 ->createQueryBuilder('v')
                                 ->select('v')
                                 ->where('v.objectClass = :objectClass')
                                 ->AndWhere('v.objectId = :objectId')
                                 ->setParameter('objectClass' , $objectClass)
                                 ->setParameter('objectId' , $objectId)
                                 ->orderBy('v.id' , 'desc')
                                 ->getQuery()
                                 ->getResult();

        return [
            'project' => $project ,
            'version_rollback' => $version_rollback ,
        ];
    }

    /**
     * @Route("/{project_id}/project_rollback/{version}" , name="project_rollback")
     * @Template()
     */
    public function rollbackAction($project_id , $version = 1)
    {
        $em = $this->getManager();
        $repo = $em->getRepository('Gedmo\Loggable\Entity\LogEntry'); // we use default log entry class
        $project = $this->get('project')->find($project_id);
        //$logs = $repo->getLogEntries($project);
        $repo->revert($project, $version);
        $em->persist($project);
        $em->flush();
        $this->get('version_rollback')->roll($project , $version);
        $this->alert('Success' , 'Rollback success');

        return $this->redirect('edit_project' , ['project_id' => $project_id]);
    }
}
