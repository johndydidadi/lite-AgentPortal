<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\CRUDController;
use App\Agent;


class AgentController extends CRUDController
{
    public function __construct(Agent $model, Request $request){
        parent::__construct();

        $this->resourceModel = $model;
        $this->validationRules = [
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'address' => 'required',
            'gender' => 'required',
            'birth_Date' => 'required',
            'contact_number' => 'required|numeric',
            'email' => 'required',
            'quota' => 'required',
        ];
    }
}
