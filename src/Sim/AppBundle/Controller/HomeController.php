<?php

namespace Sim\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sim\AppBundle\Entity\Connect;
use Sim\AppBundle\Form\ConnectType;
use Sim\AppBundle\Form\SearchClientType;
use Sim\AppBundle\Form\SearchContactsType;
use Sim\AppBundle\Form\SearchEventType;
use Sim\AppBundle\Form\SearchProjectType;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/" , name="home")
     * @Template()
     */
    public function homeAction(Request $request)
    {
        $logs = $this->get('log');
        $logs = $this->get('page')->get($logs);



        return ['logs' => $logs];
    }

    /**
     * @Route("/create" , name="create_connect")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $translator = $this->get('translator');

        $em = $this->getManager();
        $connect = new Connect();
        $type = new ConnectType();
        $form = $this->getForm($type,$connect,$request);
        $this->processForm($form,$connect);
        if($form->isValid())
        {
            $connect->setInitial($this->get('string_utils')->pinyin($connect->getName()));
            $em->persist($connect);
            $em->flush();
            $this->alert($translator->trans('message.home.create_success') , $translator->trans('message.home.contacts_is_created'));

            return $this->redirect('connect_edit' , ['connect_id'=> $connect->getId()]);
        }

        return [
            'form' => $form->createView() ,
        ];
    }

    /**
     * @Route("/search_contacts" , name="search_contacts")
     * @Template()
     */
    public function searchContactsAction(Request $request)
    {

        $type = new SearchContactsType();
        $form = $this->createForm($type);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $data = $form->getData();
            $list = $this->get('connect_find')->findBy($data);
        }

        return [
            'form' => $form->createView() ,
            'list' => isset($list) ? $list : [] ,

        ];
    }

    /**
     * @Route("/search_clients" , name="search_clients")
     * @Template()
     */
    public function searchClientsAction(Request $request)
    {

        $type = new SearchClientType();
        $form = $this->createForm($type);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $data = $form->getData();
            $list = $this->get('client_find')->findBy($data);
        }

        return [
            'form' => $form->createView() ,
            'list' => isset($list) ? $list : [] ,

        ];
    }

    /**
     * @Route("/search_events" , name="search_events")
     * @Template()
     */
    public function searchEventAction(Request $request)
    {

        $type = new SearchEventType();
        $form = $this->createForm($type);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $data = $form->getData();
            $list = $this->get('event_find')->findBy($data);
        }

        return [
            'form' => $form->createView() ,
            'list' => isset($list) ? $list : [] ,
        ];
    }

    /**
     * @Route("/search_projects" , name="search_projects")
     * @Template()
     */
    public function searchProjectAction(Request $request)
    {

        $type = new SearchProjectType();
        $form = $this->createForm($type);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $data = $form->getData();
            $list = $this->get('project_find')->findBy($data);
        }

        return [
            'form' => $form->createView() ,
            'list' => isset($list) ? $list : [] ,
        ];
    }
}