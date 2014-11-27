<?php

namespace Sim\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as CoreController;


class Controller extends CoreController
{

    public function getForm($type ,$entity ,$request)
    {
        $form = $this->createForm($type,$entity);
        $form->handleRequest($request);
        return $form;
    }

    public function processForm($form,$entity)
    {
        if($form->isValid())
        {
            if( $entity->getId() == NULL && method_exists($entity,'setCreatedAt'))
            {
                $entity->setCreatedAt(new \Datetime());
                if(method_exists($entity,'setUpdatedAt'))
                {
                    $entity->setUpdatedAt(new \Datetime());
                }
            }

            if( $entity->getId() && method_exists($entity,'setUpdatedAt'))
            {
                $entity->setUpdatedAt(new \Datetime());
            }
        }

    }

    public function redirect($route_name , $params=[])
    {
        return parent::redirect(parent::generateUrl($route_name,$params));
    }

    public function jump($url)
    {
        return parent::redirect($url);
    }

    public function getManager()
    {
        return $this->getDoctrine()->getManager();
    }

}
