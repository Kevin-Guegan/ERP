<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Entity\Customer;
use AppBundle\Entity\Invoice;
use AppBundle\Entity\Quote;
use AppBundle\Entity\Vat;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class AdminControllerTest extends WebTestCase
{

    protected $client;

    public function setUp(){
        $this->client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'toto',
            'PHP_AUTH_PW' => 'admin',
        ));
    }

    /**
     * @dataProvider urlProvider
     */
    public function testIndexAction($url)
    {

        $crawler = $this->client->request('GET', $url);
        $this->assertSame(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
    }


    public function urlProvider()
    {
        return array(
            array('/login'),
            array('/admin'),
            array('/admin/chart'),
            array('/admin/customerlist'),
            array('/admin/quotelist'),
            array('/admin/invoicelist')
        );
    }

    public function testCreateCustomer(){
        $customer = new Customer();

        $customer->setName('ASA');
        $customer->setAddress('1 rue de la republique');
        $customer->setAddress2('2 rue paster');
        $customer->setEmail('a@a.fr');
        $customer->setZipcode('35000');

        $this->assertEquals ( 'ASA', $customer->getName() );
        $this->assertEquals ( '1 rue de la republique', $customer->getAddress() );
        $this->assertEquals ( '2 rue paster', $customer->getAddress2() );
        $this->assertEquals ( 'a@a.fr', $customer->getEmail() );
        $this->assertEquals ( '35000', $customer->getZipcode() );

    }

    public function testCreateQuote(){
            $quote = new Quote();
            $customer = new Customer();
            $customer->getId();

            $vat = new Vat();
            $vat->getId();

            $quote->setNumber('QUO001');
            $quote->setTotalpriceHT(0);
            $quote->setTotalpriceTTC(0);
            $quote->setVatId($vat);
            $quote->setCustomerId($customer);

            $this->assertEquals ( 'QUO001', $quote->getNumber() );
            $this->assertEquals ( 0, $quote->getTotalpriceHT() );
            $this->assertEquals ( 0, $quote->getTotalpriceTTC() );

    }

    public function testCreateInvoice(){
        $invoice = new Invoice();
        $customer = new Customer();
        $customer->getId();

        $vat = new Vat();
        $vat->getId();

        $invoice->setNumber('FA001');
        $invoice->setTotalpriceHT(0);
        $invoice->setTotalpriceTTC(0);
        $invoice->setVatId($vat);
        $invoice->setCustomerId($customer);

        $this->assertEquals ( 'FA001', $invoice->getNumber() );
        $this->assertEquals ( 0, $invoice->getTotalpriceHT() );
        $this->assertEquals ( 0, $invoice->getTotalpriceTTC() );

    }
}