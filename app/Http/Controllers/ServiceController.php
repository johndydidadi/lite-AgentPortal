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
            'service' => 'required',
            'price' => 'required'
        ];
    }
}
