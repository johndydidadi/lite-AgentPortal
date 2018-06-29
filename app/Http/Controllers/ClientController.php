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
                'services.*.service_id' => 'nullable|distinct'
            ],
            'update' => [
                'company' => 'required',
                'representative' => 'required',
                'contact_number' => 'required',
                'address' => 'required',
                'nature_of_business' => 'required',
                'services.*.service_id' => 'nullable|distinct'
            ]    
        ];
    }

     public function afterUpdate($model)
    {
        $servicesId = array_column($this->validatedInput['services'], 'service_id');
        $model->services()->sync($servicesId);
    }

    public function afterStore($model)
    {
        $servicesId = array_column($this->validatedInput['services'], 'service_id');
        $model->services()->attach($servicesId);
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
