<?php

namespace Sim\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BuilderController extends Controller
{
    /**
     * @Route("/" , name="builder_home")
     * @Template()
     */
    public function homeAction()
    {
        return [];
    }

}
