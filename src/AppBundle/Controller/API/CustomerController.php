<?php

namespace AppBundle\Controller\API;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\View;

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
        $anomalies = $this->getDoctrine()->getRepository('AppBundle:Customer')->findAll();

        if (count($anomalies) == 0) {
            throw new NotFoundHttpException('Anomaly not found');
        } else {
            $view = $this->view($anomalies, 200)->setFormat('json');
        }

        return $view;
    }
}
