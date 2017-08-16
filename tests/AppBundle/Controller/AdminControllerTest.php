<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testIndexAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
