<?php

namespace AppBundle\Controller\API;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\View;

/**
 * Class InvoiceController
 * @package AppBundle\Controller\API
 * @Route("/invoice", name="api_invoice")
 */
class InvoiceController extends FOSRestController
{
    /**
     * @Route("/")
     *
     * @Method("GET")
     *
     * @return View
     */
    public function getAllInvoice(): View
    {
        $invoice = $this->getDoctrine()->getRepository('AppBundle:Invoice')->findAll();

        if (count($invoice) == 0) {
            throw new NotFoundHttpException('Invoice not found');
        } else {
            $view = $this->view($invoice, 200)->setFormat('json');
        }

        return $view;
    }
}
