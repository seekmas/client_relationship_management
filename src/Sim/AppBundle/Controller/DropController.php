<?php

namespace Sim\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DropController extends Controller
{
    /**
     * @Route("/{fluent_id}/drop_fluent" , name="drop_fluent")
     * @Template()
     */
    public function dropFluentAction(Request $request , $fluent_id)
    {
        $em = $this->getManager();

        $fluent = $this->get('fluent')->find($fluent_id);

        $em->remove($fluent);

        $em->flush();

        return $this->jump($request->headers->get('referer'));
    }
}