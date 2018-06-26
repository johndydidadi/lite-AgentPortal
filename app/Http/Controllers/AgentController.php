<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\CRUDController;
use Illuminate\Validation\Rule;
use App\Agent;
use App\User;
class AgentController extends CRUDController
{
    public function __construct(Agent $model, Request $request){
        parent::__construct();

        $this->resourceModel = $model;
        $this->validationRules = [
            'store' => [
                'firstname' => 'required|alpha_spaces',
                'middlename' => 'nullable',
                'lastname' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'role' => 'nullable',
                'birth_date' => 'required',
                'contact_number' => 'required|numeric',
                'email' => 'required|unique:agents,email',
                'password' => 'required',
                'quota' => 'required',
                'password' => 'required|min:4',
                'quota' => 'required'
            ],
            'update' => [
                'firstname' => 'required|alpha_spaces',
                'middlename' => 'nullable',
                'lastname' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'role' => 'nullable',
                'birth_date' => 'required',
                'contact_number' => 'required|numeric',
                'email' => ['required', Rule::unique('agents', 'email')->ignore($request->route('agent'))],
                'password' => 'min:8|confirmed',
                'quota' => 'required'

            ]
        ];
    }

    public function beforeStore()
    {
        $this->validatedInput['quota'] = str_replace(',', '', $this->validatedInput['quota']);
    }

    public function beforeUpdate()
    {
        $this->beforeStore();
    }
   
}
