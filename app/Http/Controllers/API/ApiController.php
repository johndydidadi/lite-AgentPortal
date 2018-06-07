<?php

namespace App\Http\Controllers\API;
use App\Service;
use App\Client;
use App\CRUDController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends CRUDController
{
    public function displayData(Request $request, $id){

   //   	$data = json_encode(ClientService::all());

		 // return response()->json([
   //               'service_id' => $service_id
   //          ])->with('client_id', $client_id);;

   //  	     	$data = json_encode(ClientService::all());

		 // return response()->json([
		 // 		'client_id' = $client_id,
   //              'service_id' = $service_id
   //          ]);

    	$data = Service::find(Client::get('id'));
    	return $data;
    }
}
