<?php namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response     = $client->get('https://covid19.mathdro.id/api/confirmed');
        return $response->getBody();
    }
}