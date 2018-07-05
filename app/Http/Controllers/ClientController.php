<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\CRUDController;
use App\Client;
use App\Service;
use App\ClientService;
use DB;
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
        $request=request();

        if($request->company){
            $query->where(DB::raw("`company`"),'like',"%{$request->company}%");
        }else if($request->representative){

            $query->where(DB::raw("`representative`"),'like',"%{$request->representative}%");
        }else if($request->address){
            $query->where(DB::raw("`address`"),'like',"%{$request->address}%");
        }else{
            $query->with('services');
        }


    }
}
