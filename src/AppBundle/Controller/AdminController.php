<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * Administration Page
     *
     * @Route("/admin", name="admin")
     */
    public function indexAction()
    {
        return $this->render('@App/index.html.twig');
    }

    /**
     * Create quote
     *
     * @Route("/admin/quote", name="quote")
     */
    public function createQuoteAction()
    {
        return $this->render('@App/createQuote.html.twig');
    }

    /**
     * List of quote
     *
     * @Route("/admin/quotelist", name="quotelist")
     */
    public function quoteListAction()
    {
        return $this->render('@App/quoteList.html.twig');
    }

    /**
     * Create invoice
     *
     * @Route("/admin/invoice", name="invoice")
     */
    public function createInvoiceAction()
    {
        return $this->render('@App/createInvoice.html.twig');
    }

    /**
     * List of invoice
     *
     * @Route("/admin/invoicelist", name="invoicelist")
     */
    public function invoiceListAction()
    {
        return $this->render('@App/invoiceList.html.twig');
    }

    /**
     * Chart
     *
     * @Route("/admin/chart", name="chart")
     */
    public function charttAction()
    {
        return $this->render('@App/chart.html.twig');
    }
}
