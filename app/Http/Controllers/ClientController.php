<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\CRUDController;
use App\Client;

class ClientController extends CRUDController
{
    public function __construct(Client $model, Request $request){
        parent::__construct();

        $this->resourceModel = $model;
        $this->validationRules = [
            'store' => [
                'company' => 'required',
                'representative' => 'required|alpha',
                'contact_number' => 'required',
                'address' => 'required',
                'nature_of_business' => 'required',
                'service' => 'required'
            ],
            'update' => [
                'company' => 'required',
                'representative' => 'required|alpha',
                'contact_number' => 'required',
                'address' => 'required',
                'nature_of_business' => 'required',
                'service' => 'required'
            ]    
        ];
    }
}
