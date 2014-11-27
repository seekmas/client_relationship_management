<?php

namespace Sim\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sim\AppBundle\Entity\Connect;
use Sim\AppBundle\Entity\Event;
use Sim\AppBundle\Entity\Fluent;
use Sim\AppBundle\Entity\Project;
use Sim\AppBundle\Form\ConnectType;
use Sim\AppBundle\Form\EventType;
use Sim\AppBundle\Form\FluentType;
use Sim\AppBundle\Form\ProjectType;
use Sim\AppBundle\Form\SelectClientType;
use Sim\AppBundle\Form\SelectConnectType;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    /**
     * @Route("/create" , name="create_project")
     * @Template()
     */
    public function createAction(Request $request)
    {

        $em = $this->getManager();

        $project = new Project();
        $type = new ProjectType();

        $form = $this->getForm($type,$project,$request);
        $this->processForm($form,$project);
        if($form->isValid())
        {
            $em->persist($project);
            $em->flush();

            return $this->redirect('edit_project' , ['project_id' => $project->getId()] );
        }

        return [
            'form' => $form->createView() ,
        ];
    }

    /**
     * @Route("/" , name="project_home")
     * @Template()
     */
    public function homeAction()
    {

        $projects = $this->get('project')
                         ->createQueryBuilder('p')
                         ->select('p')
                         ->orderBy('p.createdAt' , 'desc')
                         ->getQuery()
                         ->getResult();
        ;

        return [
            'projects' => $projects
        ];
    }

    /**
     * @Route("/{project_id}/edit" , name="edit_project")
     * @Template()
     */
    public function editAction(Request $request , $project_id)
    {
        $project = $this->get('project')->find($project_id);


        $select = new SelectClientType();

        $form = $this->createForm($select);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $data = $form->getData();
            $project->setClient($data['client']);
            $em = $this->getManager();
            $em->persist($project);
            $em->flush();
            return $this->redirect('edit_project' , ['project_id' => $project->getId()]);
        }

        return [
            'project' => $project ,
            'form'    => $form->createView() ,
        ];
    }

    /**
     * @Route("/{project_id}/update/{fluent_id}" , name="update_project_basic_info" , defaults={"fluent_id": 0})
     * @Template()
     */
    public function updateAction(Request $request , $project_id , $fluent_id = 0)
    {
        $em = $this->getManager();
        $project = $this->get('project')->find($project_id);
        $type = new ProjectType();
        $form = $this->getForm($type , $project , $request);
        $this->processForm($form,$project);
        if($form->isValid())
        {
            $em->persist($project);
            $em->flush();
            return $this->redirect('update_project_basic_info' , ['project_id' => $project_id]);
        }

        $fluent  = ($fluent_id == 0 ? new Fluent() : $this->get('fluent')->find($fluent_id));
        $fluent_type = new FluentType();
        $fluent_form = $this->getForm($fluent_type , $fluent , $request);
        $this->processForm($fluent_form , $fluent);
        if($fluent_form->isValid())
        {
            $fluent->setProject($project);
            $em->persist($fluent);
            $em->flush();

            return $this->redirect('update_project_basic_info' , ['project_id' => $project_id]);
        }

        return [
            'project' => $project ,
            'form' => $form->createView() ,
            'fluent_form' => $fluent_form->createView() ,
        ];
    }

    /**
     * @Route("/{project_id}/add_connect" , name="update_project_connect_info")
     * @Template()
     */
    public function addConnectAction(Request $request , $project_id)
    {
        $em = $this->getManager();
        $project = $this->get('project')->find($project_id);

        $connect = new Connect();
        $type = new ConnectType();
        $form = $this->getForm($type,$connect,$request);
        $this->processForm($form,$connect);
        if($form->isValid())
        {
            $connect->setProject($project);
            $em->persist($connect);
            $em->flush();
            return $this->redirect('edit_project' , ['project_id' => $project_id]);
        }

        $select_type = new SelectConnectType();
        $select_form = $this->createForm($select_type , $project);
        $select_form->handleRequest($request);
        if($select_form->isValid())
        {
            $em->persist($project);
            $em->flush();

            return $this->redirect('edit_project' , ['project_id' => $project_id]);
        }

        return [
            'form' => $form->createView() ,
            'select_form' => $select_form->createView() ,
        ];
    }

}
