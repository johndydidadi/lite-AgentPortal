<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\CRUDController;
use App\Client;
use App\Service;
use App\ClientService;
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
                'services.*.service_id' => 'nullable'
            ],
            'update' => [
                'company' => 'required',
                'representative' => 'required',
                'contact_number' => 'required',
                'address' => 'required',
                'nature_of_business' => 'required',
                'services.*.service_id' => 'nullable'
            ]    
        ];
    }

     public function afterUpdate($model)
    {
        $model->services()->sync($this->validatedInput['services']);

    }

    public function afterStore($model)
    {
        $model->services()->attach($this->validatedInput['services']);
    }

    public function beforeCreate()
    {   
        $this->viewData['services'] = Service::pluck('service', 'id')->prepend('Select Services','');   
    }

     public function beforeEdit($model)
    {   
        $this->viewData['services'] = $model->load('services');
        $this->beforeCreate();
    }

    public function beforeIndex($query)
    {   
        $query->with('services');
    }

}
