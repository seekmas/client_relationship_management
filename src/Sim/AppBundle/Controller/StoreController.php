<?php

namespace Sim\AppBundle\Controller;

use Symfony\Component\Foundation\HttpRequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class StoreController extends Controller
{
    /**
    * @Route("/" , name="store_home")
    * @Template()
    */
    public function indexAction(Request $request)
    {
        return [];
    }
}
