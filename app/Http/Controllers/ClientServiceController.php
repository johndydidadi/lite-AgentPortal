<?php

namespace App\Http\Controllers;
use App\Client;
use App\Common\CRUDController;
use Illuminate\Http\Request;

class ClientServiceController extends Controller
{
    public function showServices(Request $request, Client $client)
    {
    	
        dd($client->toArray());
    }
}
