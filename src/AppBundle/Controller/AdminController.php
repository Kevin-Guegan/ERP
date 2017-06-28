<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Customer;
use AppBundle\Form\CustomerType;
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
     * @Route("/admin/customer", name="customer")
     */
    public function customerAction()
    {

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
