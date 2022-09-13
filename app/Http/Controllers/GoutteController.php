<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class GoutteController extends Controller
{
    public function doWebScraping()
    {
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60,
            'verify' => false
        ));
    //    echo"<pre>"; print_r($goutteClient);die();
        // $goutteClient->setClient($guzzleClient);
        $crawler = $goutteClient->request('GET', 'https://www.cdc.gov/poxvirus/monkeypox/response/2022/us-map.html');
        $crawler->filter('.table-container a')->each(function ($node) {
            // dump($node->text());
          echo"<pre>";  print_r($node->text());
        });
    }
}
