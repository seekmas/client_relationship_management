<?php

namespace Sim\AppBundle\Controller;

use Sim\AppBundle\Entity\Note;
use Sim\AppBundle\Entity\NoteComment;
use Sim\AppBundle\Form\NoteCommentType;
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
        $user = $this->getUser();
        $notes = $this->get('note')
                      ->createQueryBuilder('n')
                      ->select('n')
                      ->where('n.userId = :userId')
                      ->orderBy('n.id' , 'desc')
                      ->setParameter('userId' , $user->getId())
                      ->getQuery()
                      ->getResult();

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
            'form' => $form->createView(),
            'notes' => $notes
        ];
    }

    /**
     * @Route("/upcoming" , name="upcoming_note")
     * @Template()
     */
    public function upcomingAction()
    {


        $user = $this->getUser();
        $notes = $this->get('note')
                      ->createQueryBuilder('n')
                      ->select('n')
                      ->orderBy('n.id' , 'desc')
                      ->where('n.userId = :userId')
                      ->setParameter('userId' , $user->getId())
                      ->getQuery()
                      ->getResult();
        return [
            'notes' => $notes ,
        ];
    }

    /**
     * @Route("/{id}/view" , name="view_note")
     * @Template()
     */
    public function viewAction(Request $request , $id)
    {

        $user = $this->getUser();
        $em = $this->getManager();

        $note = $this->get('note')->find($id);

        $noteComment = new NoteComment();
        $type = new NoteCommentType();
        $form = $this->getForm($type , $noteComment , $request);
        if($form->isValid())
        {
            $noteComment->setUser($user);
            $noteComment->setNote($note);
            $noteComment->setCreatedAt(new \Datetime());
            $noteComment->setUpdatedAt(new \Datetime());

            $em->persist($noteComment);
            $em->flush();

            $this->alert('Success' , 'Comment Success');
            return $this->redirect('view_note' , ['id' => $id]);
        }

        return [
            'note' => $note ,
            'form' => $form->createView() ,
        ];
    }
}