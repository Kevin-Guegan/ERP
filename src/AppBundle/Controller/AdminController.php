<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * Matches /blog exactly
     *
     * @Route("/admin", name="admin")
     */
    public function indexAction()
    {
        return $this->render('@App/index.html.twig');
    }
}
