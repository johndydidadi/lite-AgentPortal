<?php

namespace App\Http\Controllers\API;
use App\ClientService;
use App\CRUDController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends CRUDController
{
    public function displayData(Request $request){

   //   	$data = json_encode(User::all());

		 // return response()->json([
   //               'users' => $users
   //          ]);

    }
}
