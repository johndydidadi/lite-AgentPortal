<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\CRUDController;
use Illuminate\Validation\Rule;
use App\User;

class UserController extends CRUDController
{
    public function __construct(User $model, Request $request){
    	parent::__construct();

    	$this->resourceModel=$model;
    	$this->validationRules = [
            'store' => [
                'firstname' => 'required|alpha_spaces',
                'middlename' => 'nullable',
                'lastname' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'birth_date' => 'required',
                'contact_number' => 'required|numeric',
                'email' => 'required|unique:users,email',
                'username' => 'required|unique:users,username',
                'password' => 'required|min:8',
                'role' => 'required',
                'quota' => 'nullable'
            ],
            'update' => [
                'username' => 'nullable',
                'firstname' => 'required|alpha_spaces',
                'middlename' => 'nullable',
                'lastname' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'Role' => [
                    Rule::unique('users', 'role')->ignore($request->route('user'))
                ],
                'birth_date' => 'required',
                'contact_number' => 'required|numeric',
                'email' => ['required', Rule::unique('users', 'email')->ignore($request->route('user'))],
                'quota' => 'nullable'
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
     
}
