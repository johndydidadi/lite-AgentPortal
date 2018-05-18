<?php

namespace App\Http\Controllers;

use App\Agent;
use App\User;
use Illuminate\Http\Request;
use App\Common\CRUDController;
use Illuminate\Validation\Rule;

class AgentController extends CRUDController
{
    public function __construct(Agent $model, Request $request){
        parent::__construct();

        $this->resourceModel = $model;
        $this->validationRules = [
            'store' => [
                'firstname' => 'required|alpha',
                'middlename' => 'alpha|nullable',
                'lastname' => 'required|alpha',
                'address' => 'required',
                'gender' => 'required',
                'birth_date' => 'required',
                'contact_number' => 'required|numeric',
                'email' => 'required|unique:agents,email',
                'quota' => 'required',
            ],
            'update' => [
                'firstname' => 'required|alpha',
                'middlename' => 'alpha|nullable',
                'lastname' => 'required|alpha',
                'address' => 'required',
                'gender' => 'required',
                'birth_date' => 'required',
                'contact_number' => 'required|numeric',
                'email' => ['required', Rule::unique('agents', 'email')->ignore($request->route('agent'))],
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
            'firstname' => $this->validatedInput['firstname'],
            'middlename' => $this->validatedInput['middlename'],
            'lastname' => $this->validatedInput['lastname'],
            'email' => $this->validatedInput['email'],
            'role' => 'Agent',
            'username' => $this->validatedInput['email'],
            'password' => '1234',

        ]);
    }

}
