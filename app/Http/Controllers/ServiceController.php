<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Common\CRUDController;

class ServiceController extends CRUDController
{
    public function __construct(Service $model, Request $request)
    {
        parent::__construct();

        $this->resourceModel = $model;
        $this->validationRules = [
        	'store' => [
	            'service' => 'required',
	            'price' => 'required'
        	],
        	'update' => [
        		'service' => 'required',
	            'price' => 'required'
        	]
        ];
    }

    public function beforeStore()
    {
         $this->validatedInput['price'] = str_replace(',', '', $this->validatedInput['price']);
    }

    public function beforeUpdate()
    {
        $this->beforeStore();
    }
}
