<?php

namespace Sim\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sim\AppBundle\Entity\Fixed;
use Sim\AppBundle\Entity\Fluent;
use Sim\AppBundle\Form\ConnectType;
use Sim\AppBundle\Form\FixedType;
use Sim\AppBundle\Form\FluentType;
use Symfony\Component\HttpFoundation\Request;

class ConnectController extends Controller
{
    /**
     * @Route("/" , name="connect_home")
     * @Template()
     */
    public function homeAction()
    {

        $connects = $this->get('connect')->findAll();

        return [
            'connects' => $connects
        ];
    }

    /**
     * @Route("/{connect_id}/edit" , name="connect_edit")
     * @Template()
     */
    public function editAction(Request $request , $connect_id)
    {

        $em = $this->getManager();

        $connect = $this->get('connect')->find($connect_id);

        $fixed = $connect->getFixed() ? $connect->getFixed() : new Fixed();

        return [
            'connect' => $connect ,
            'fixed' => $fixed ,
        ];
    }

    /**
     * @Route("/{connect_id}/update" , name="connect_update")
     * @Template()
     */
    public function updateAction(Request $request , $connect_id)
    {
        $em = $this->getManager();
        $connect = $this->get('connect')->find($connect_id);
        $type = new ConnectType();
        $form = $this->getForm($type,$connect,$request);
        $this->processForm($form,$connect);
        if($form->isValid())
        {
            $em->persist($connect);
            $em->flush();

            return $this->redirect('connect_edit' , ['connect_id' => $connect_id]);
        }

        return [
            'connect' => $connect ,
            'form'    => $form->createView()
        ];
    }

    /**
     * @Route("/{connect_id}/fixed_property" , name="connect_fixed")
     * @Template()
     */
    public function fixedAction(Request $request , $connect_id)
    {

        $em = $this->getManager();

        $connect = $this->get('connect')->find($connect_id);

        $fixed = $connect->getFixed() ? $connect->getFixed() : new Fixed();
        $type = new FixedType();
        $form = $this->getForm($type ,$fixed ,$request  );
        $this->processForm($form , $fixed);
        if($form->isValid())
        {
            $fixed->setConnect($connect);
            $em->persist($fixed);
            $em->flush();
            return $this->redirect('connect_edit' , ['connect_id' => $connect_id]);
        }

        $fluent = new Fluent();
        $type = new FluentType();
        $fluent->setFixed($fixed);
        $f_form = $this->getForm($type,$fluent,$request);
        $this->processForm($f_form,$fluent);
        if($f_form->isValid())
        {
            $em->persist($fluent);
            $em->flush();


        }

        return [
            'connect'   => $connect ,
            'fixed'     => $fixed ,
            'form'      => $form->createView() ,
            'f_form'    => $f_form->createView() ,
        ];
    }

}
