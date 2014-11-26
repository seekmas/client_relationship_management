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
     * @Route("/create" , name="create_connect")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $em = $this->getManager();

        $connect = new Connect();
        $type = new ConnectType();
        $form = $this->getForm($type,$connect,$request);
        $this->processForm($form,$connect);
        if($form->isValid())
        {
            $em->persist($connect);
            $em->flush();
            return $this->redirect('home');
        }

        return [
            'form' => $form->createView() ,
        ];
    }

    /**
     * @Route("/" , name="home")
     * @Template()
     */
    public function homeAction(Request $request)
    {

        $logs = $this->get('log')->createQueryBuilder('l')->select('l')->orderBy('l.id' , 'desc')->getQuery()->getResult();
        return ['logs' => $logs];
    }
}