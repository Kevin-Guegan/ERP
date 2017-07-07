<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Customer;
use AppBundle\Entity\Invoice;
use AppBundle\Entity\Quote;
use AppBundle\Form\CustomerType;
use AppBundle\Form\InvoiceType;
use AppBundle\Form\QuoteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
     * @Route("/admin/quotecreate", name="quotecreate")
     */
    public function createQuoteAction(Request $request)
    {
        $quote = new Quote();
        $form = $this->createForm(QuoteType::class, $quote);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quote);
            $em->flush();


            //Mettre à jour la table quoteline avec le dernier Id de devis, à modifier voir coté Entité
            $updateQuoteline = 'Update quoteline set quoteId = '.$quote->getId().' WHERE quoteId IS NULL ;';

            $statement = $em->getConnection()->prepare($updateQuoteline);
            $statement->execute();

            $request->getSession()->getFlashBag()->add('notice', 'Devis bien créée.');

            return $this->redirect($this->generateUrl('quote', array('id' => $quote->getId())));

        }

        return $this->render('@App/createQuote.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Check Quote
     *
     * @Route("/admin/quote/{id}", name="quote", requirements={"page": "\d+"})
     */
    public function quoteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $quote = $em->getRepository('AppBundle:Quote')
            ->find($id);

        if (!$quote){
            throw $this->createNotFoundException(
                'No Customer Found for id :'.$id
            );
        }

        $form = $this->createForm(QuoteType::class, $quote);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            return $this->redirect($this->generateUrl('quote', array('id' => $quote->getId())));
        }

        return $this->render('@App/quote.html.twig', array(
            'form' => $form->createView()
        ));
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
     * @Route("/admin/invoicecreate", name="invoicecreate")
     */
    public function createInvoiceAction(Request $request)
    {
        $invoice = new Invoice();
        $form = $this->createForm(InvoiceType::class, $invoice);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invoice);
            $em->flush();

            //Mettre à jour la table invoiceline avec le dernier Id de devis, à modifier voir coté Entité
            $updateInvoiceline = 'Update invoiceline set invoiceId = '.$invoice->getId().' WHERE invoiceId IS NULL ;';

            $statement = $em->getConnection()->prepare($updateInvoiceline);
            $statement->execute();

            $request->getSession()->getFlashBag()->add('notice', 'Facture bien créée.');

            return $this->redirect($this->generateUrl('invoice', array('id' => $invoice->getId())));
        }

        return $this->render('@App/createInvoice.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Check Invoice
     *
     * @Route("/admin/invoice/{id}", name="invoice", requirements={"page": "\d+"})
     */
    public function invoiceAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $invoice = $em->getRepository('AppBundle:Invoice')
            ->find($id);

        if (!$invoice){
            throw $this->createNotFoundException(
                'No Invoice Found for id :'.$id
            );
        }

        $form = $this->createForm(InvoiceType::class, $invoice);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            return $this->redirect($this->generateUrl('invoice', array('id' => $invoice->getId())));
        }

        return $this->render('@App/invoice.html.twig', array(
            'form' => $form->createView()
        ));
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
    public function chartAction()
    {
        return $this->render('@App/chart.html.twig');
    }

    /**
     * Create Customer
     *
     * @Route("/admin/customercreate", name="customercreate")
     */
    public function createCustomerAction(Request $request)
    {
        $customer = new Customer();
        $form = $this->createForm(CustomerType::class, $customer);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Client bien créée.');

            return $this->redirect($this->generateUrl('customer', array('id' => $customer->getId())));
        }

        return $this->render('@App/createCustomer.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Check Customer
     *
     * @Route("/admin/customer/{id}", name="customer", requirements={"page": "\d+"})
     */
    public function customerAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $customer = $em->getRepository('AppBundle:Customer')
           ->find($id);

        if (!$customer){
           throw $this->createNotFoundException(
               'No Customer Found for id :'.$id
           );
        }

        $form = $this->createForm(CustomerType::class, $customer);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            return $this->redirect($this->generateUrl('customer', array('id' => $customer->getId())));
        }

        return $this->render('@App/customer.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * Customer List
     *
     * @Route("/admin/customerlist", name="customerlist")
     */
    public function customerlistAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Customer')
        ;

        $listCustomers = $repository->findAll();
        $serializer = $this->get('jms_serializer');
        $response = $serializer->serialize($listCustomers,'json');


        return $this->render('@App/customerlist.html.twig', array('customers' => $response));
    }


    /**
     * User Settings
     *
     * @Route("/admin/usersettings", name="usersettings")
     */
    public function userSettingsAction()
    {
        return $this->render('@App/usersettings.html.twig');
    }
}
