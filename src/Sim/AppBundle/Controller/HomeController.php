<?php

namespace Sim\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sim\AppBundle\Entity\Connect;
use Sim\AppBundle\Form\ConnectType;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/" , name="home")
     * @Template()
     */
    public function homeAction(Request $request)
    {
        //$this->alert('访问成功' , '欢迎访问' );
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
            $em->persist($connect);
            $em->flush();
            $this->alert($translator->trans('message.home.create_success') , $translator->trans('message.home.contacts_is_created'));

            return $this->redirect('connect_edit' , ['connect_id'=> $connect->getId()]);
        }

        return [
            'form' => $form->createView() ,
        ];
    }

}