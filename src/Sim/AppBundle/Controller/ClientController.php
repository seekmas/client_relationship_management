<?php

namespace Sim\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sim\AppBundle\Entity\Client;
use Sim\AppBundle\Entity\Fluent;
use Sim\AppBundle\Form\ClientType;
use Sim\AppBundle\Form\FluentType;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends Controller
{
    /**
     * @Route("/home" , name="client_home")
     * @Template()
     */
    public function homeAction()
    {
        $clients = $this->get('client')
                        ->createQueryBuilder('c')
                        ->select('c')
                        ->orderBy('c.initial')
                        ->getQuery()
                        ->getResult()
        ;

        return ['clients' => $clients];
    }

    /**
     * @Route("/create/{project_id}" , name="create_client" , defaults={"project_id": 0})
     * @Template()
     */
    public function createAction(Request $request , $project_id = 0)
    {
        $em = $this->getManager();
        $client = new Client();
        $type = new ClientType();
        $form = $this->getForm($type,$client,$request);
        $this->processForm($form,$client);
        if($form->isValid())
        {

            $client->setInitial($this->get('string_utils')->pinyin($client->getName()));

            $em->persist($client);
            $em->flush();
            if($project_id > 0)
            {
                $project = $this->get('project')->find($project_id);
                $project->setClient($client);
                $em->persist($project);
                $em->flush();
            }

            return $this->redirect('edit_client' , ['client_id' => $client->getId()]);
        }

        return [
            'form' => $form->createView() ,
        ];
    }

    /**
     * @Route("/{client_id}/edit" , name="edit_client")
     * @Template()
     */
    public function editAction(Request $request , $client_id)
    {
        $client = $this->get('client')->find($client_id);
        return [
            'client' => $client ,
        ];
    }

    /**
     * @Route("/{client_id}/update/{fluent_id}" , name="update_client" , defaults={"fluent_id": 0})
     * @Template()
     */
    public function updateAction(Request $request , $client_id , $fluent_id = 0)
    {
        $em = $this->getManager();

        $client = $this->get('client')->find($client_id);
        $type = new ClientType();
        $form = $this->getForm($type,$client,$request);
        $this->processForm($form , $client);
        if($form->isValid())
        {
            $client->setInitial($this->get('string_utils')->pinyin($client->getName()));
            $em->persist($client);
            $em->flush();

            return $this->redirect('update_client' , ['client_id' => $client->getId()]);
        }


        $fluent = $fluent_id == 0 ? new Fluent() : $this->get('fluent')->find($fluent_id);

        $fluent_type = new FluentType();
        $fluent_form = $this->getForm($fluent_type , $fluent , $request);
        $this->processForm($fluent_form , $fluent);
        if($fluent_form->isValid())
        {
            $fluent->setClient($client);
            $em->persist($fluent);
            $em->flush();
            return $this->redirect('update_client' , ['client_id' => $client->getId()]);
        }

        return [
            'client' => $client ,
            'form'   => $form->createView() ,
            'fluent_form' => $fluent_form->createView() ,
        ];
    }
}
