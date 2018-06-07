<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\CRUDController;
use App\Client;
use App\Service;
class ClientController extends CRUDController
{
    public function __construct(Client $model, Request $request){
        parent::__construct();

        $this->resourceModel = $model;
        $this->validationRules = [
            'store' => [
                'company' => 'required',
                'representative' => 'required',
                'contact_number' => 'required',
                'address' => 'required',
                'nature_of_business' => 'required',
            ],
            'update' => [
                'company' => 'required',
                'representative' => 'required',
                'contact_number' => 'required',
                'address' => 'required',
                'nature_of_business' => 'required',
            ]    
        ];
    }

    public function beforeStore()
    {
        // dd(request()->all());
    }

    public function beforeUpdate()
    {
        // $this->beforeStore();
    }

    public function afterStore($client)
    {
        $client->services()->attach(request()->services);
    }

    public function beforeCreate()
    {   
        $this->viewData['services'] = Service::pluck('service','id')->prepend('Select Services','');   
    }

     public function beforeEdit($client)
    {   
        $this->beforeCreate();
    }
}
