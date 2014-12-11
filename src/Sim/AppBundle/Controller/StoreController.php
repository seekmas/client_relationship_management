<?php

namespace Sim\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class StoreController extends Controller
{
    /**
    * @Route("/" , name="sharing_home")
    * @Template()
    */
    public function indexAction(Request $request)
    {
        return [];
    }
}
