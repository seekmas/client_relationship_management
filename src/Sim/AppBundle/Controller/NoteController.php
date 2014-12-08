<?php

namespace Sim\AppBundle\Controller;

use Sim\AppBundle\Entity\Note;
use Sim\AppBundle\Form\NoteType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class NoteController extends Controller
{
    /**
     * @Route("/list" , name="list_of_notes")
     * @Template()
     */
    public function listAction(Request $request)
    {

        $note = new Note();
        $type = new NoteType();
        $form = $this->getForm($type,$note,$request);
        $this->processForm($form,$note);

        if($form->isValid())
        {
            $note->setIsEnabled(true);
            $note->setUser($this->getUser());
            $note->setUpdatedAt(new \Datetime());
            $note->setCreatedAt(new \Datetime());

            $em = $this->getManager();
            $em->persist($note);
            $em->flush();

            $this->alert('Success' , 'Add note success');
            return $this->redirect('list_of_notes');
        }

        return [
            'form' => $form->createView()
        ];
    }

    /**
     * @Route("/upcoming" , name="upcoming_note")
     * @Template()
     */
    public function upcomingAction()
    {
        $user = $this->getUser();
        $notes = $this->get('note')->findBy(['userId' => $user->getId()]);


        return [
            'notes' => $notes ,
        ];
    }
}