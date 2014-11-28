<?php

namespace Sim\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sim\AppBundle\Entity\Event;
use Sim\AppBundle\Entity\Project;
use Sim\AppBundle\Form\EventType;
use Sim\AppBundle\Form\ProjectType;
use Sim\AppBundle\Form\SelectProjectType;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    /**
     * @Route("/create" , name="create_event")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $translator = $this->get('translator');
        $em = $this->getManager();

        $event = new Event();
        $event_type = new EventType();
        $form = $this->getForm($event_type, $event, $request);
        $this->processForm($form ,$event);
        if($form->isValid())
        {
            $em->persist($event);
            $em->flush();
            $this->alert($translator->trans('message.event.create_success') ,$translator->trans('message.event.event_is_created'));

            return $this->redirect('event_linkto' , ['event_id' => $event->getId()]);
        }

        return ['form'=>$form->createView()];
    }

    /**
     * @Route("/{event_id}/linkto" , name="event_linkto")
     * @Template()
     */
    public function linktoAction(Request $request , $event_id)
    {
        $translator = $this->get('translator');
        $em = $this->getManager();
        $event = $this->get('event')->find($event_id);

        $project = new Project();
        $type = new ProjectType();
        $form = $this->getForm( $type , $project , $request);
        $this->processForm($form,$project);
        if($form->isValid())
        {
            $em = $this->getManager();
            $em->persist($project);
            $em->flush();
            $event->setProject($project);
            $em->persist($event);
            $em->flush();
            $this->alert($translator->trans('message.event.link_success') ,$translator->trans('message.event.link_to_project') );

            return $this->redirect('event_linkto' , ['event_id' => $event_id]);
        }

        $select_form = $this->createForm(new SelectProjectType());
        $select_form->handleRequest($request);
        if($select_form->isValid())
        {
            $data = $select_form->getData();
            $event->setProject($data['project']);
            $em = $this->getManager();
            $em->persist($event);
            $em->flush();
            $this->alert($translator->trans('message.event.link_success') ,$translator->trans('message.event.link_to_project') );

            return $this->redirect('edit_project' , ['project_id' => $event->getProject()->getId()]);
        }

        $this->get('project')->findAll();

        return [
            'event' => $event ,
            'form'  => $form->createView() ,
            'select_form' => $select_form->createView() ,
        ];
    }

    /**
     * @Route("/{project_id}/create" , name="event_created_from_project")
     * @Template()
     */
    public function createFromProjectAction( Request $request , $project_id)
    {
        $translator = $this->get('translator');
        $em = $this->getManager();
        $event = new Event();
        $type = new EventType();

        $form = $this->getForm($type , $event , $request);
        $this->processForm($form , $event);
        if($form->isValid())
        {
            $project = $this->get('project')->find($project_id);
            $event->setProject($project);

            $em->persist($event);
            $em->flush();
            $this->alert($translator->trans('message.event.create_success') ,$translator->trans('message.event.event_is_created'));

            return $this->redirect('edit_project' , ['project_id' => $project_id]);
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/" , name="event_home")
     * @Template()
     */
    public function homeAction()
    {
        return [];
    }

}
