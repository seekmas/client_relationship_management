<?php

namespace Sim\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FacetimeController extends Controller
{
    /**
    * @Route("/" , name="facetime_home")
    * @Template()
    */
    public function homeAction(Request $request)
    {
        return [];
    }
}
