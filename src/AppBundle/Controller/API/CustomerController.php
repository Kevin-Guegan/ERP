<?php

namespace AppBundle\Controller\API;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class CustomerController
 * @package AppBundle\Controller\API
 * @Route("/customer", name="api_customer")
 */
class CustomerController extends FOSRestController
{
    /**
     * @Route("/")
     *
     * @Method("GET")
     *
     * @return View
     */
    public function getAllCustomer(): View
    {
        $customers = $this->getDoctrine()->getRepository('AppBundle:Customer')->findAll();

        if (count($customers) == 0) {
            throw new NotFoundHttpException('Customers not found');
        } else {
            $view = $this->view($customers, 200)->setFormat('json');
        }

        return $view;
    }
}
