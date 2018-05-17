<?php

namespace App\Http\Controllers;

use App\Agent;
use App\User;
use Illuminate\Http\Request;
use App\Common\CRUDController;

class AgentController extends CRUDController
{
    public function __construct(Agent $model, Request $request){
        parent::__construct();

        $this->resourceModel = $model;
        $this->validationRules = [
            'store' => [
                'firstname' => 'required|alpha',
                'lastname' => 'required|alpha',
                'address' => 'required',
                'gender' => 'required',
                'birth_date' => 'required',
                'contact_number' => 'required|numeric',
                'email' => 'required',
                'quota' => 'required',
            ],
            'update' => [
                'firstname' => 'required|alpha',
                'lastname' => 'required|alpha',
                'address' => 'required',
                'gender' => 'required',
                'birth_date' => 'required',
                'contact_number' => 'required|numeric',
                'email' => 'required',
                'quota' => 'required',

            ]
        ];
    }

    public function beforeStore()
    {
        $this->validatedInput['quota'] = str_replace(',' , '', $this->validatedInput['quota']);
    }

    public function beforeUpdate()
    {
        $this->beforeStore();
    }

    public function afterStore($model)
    {
        User::create([
            'firstname' => ' ',
            'middlename' => ' ',
            'lastname' => ' ',
            'email' => $this->validatedInput['email'],
            'username' => $this->validatedInput['email'],
            'password' => '1234'
        ]);
    }
}
