<?php

namespace App\Http\Controllers;
use App\Common\CRUDController;
use Illuminate\Http\Request;

class ClientServiceController extends Controller
{
    public function __construct(Request $request)
    {
    	parent::__construct();

    	$this->resourceModel=$model;
    	$this->validationRules = [
            'store' => [
				'service_id' => $request->service_id,
				'client_id' => $request->client_id
            ] 
        ];
    }

    public function afterStore()
    {

    }
}
