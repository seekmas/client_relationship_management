<?php

namespace Sim\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sim\AppBundle\Entity\Client;
use Sim\AppBundle\Form\ClientType;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends Controller
{
    /**
     * @Route("/home" , name="client_home")
     * @Template()
     */
    public function homeAction()
    {
        $clients = $this->get('client')->findAll();

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
        //$em = $this->getManager();
        $client = $this->get('client')->find($client_id);

        return [
            'client' => $client ,
        ];
    }
}
