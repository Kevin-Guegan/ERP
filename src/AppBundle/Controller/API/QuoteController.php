<?php

namespace AppBundle\Controller\API;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\View;

/**
 * Class QuoteController
 * @package AppBundle\Controller\API
 * @Route("/quote", name="api_quote")
 */
class QuoteController extends FOSRestController
{
    /**
     * @Route("/")
     *
     * @Method("GET")
     *
     * @return View
     */
    public function getAllQuote(): View
    {
        $quote = $this->getDoctrine()->getRepository('AppBundle:Quote')->findAll();

        if (count($quote) == 0) {
            throw new NotFoundHttpException('Quote not found');
        } else {
            $view = $this->view($quote, 200)->setFormat('json');
        }

        return $view;
    }
}
