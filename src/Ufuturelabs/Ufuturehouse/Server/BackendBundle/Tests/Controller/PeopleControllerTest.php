<?php

namespace Ufuturelabs\Ufuturehouse\Server\BackendBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PeopleControllerTest extends WebTestCase
{
    public function testIndexphysical()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/physical');
    }

    public function testIndexlegal()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/legal');
    }

}
