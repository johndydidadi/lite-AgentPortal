<?php

namespace App\Http\Controllers;
use App\Common\CRUDController;
use App\User;
use Illuminate\Http\Request;

class UserController extends CRUDController
{
    public function __construct(User $model, Request $request)
    {
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
                'email' => 'required|unique:admins,email',
                'password' => 'required|min:8',
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
                'email' => ['required', Rule::unique('user', 'email')->ignore($request->route('admin'))],
                'quota' => 'required'
            ]
        ];

    }

    public function beforeStore()
    {
        $this->validatedInput['password'] = bcrypt($this->validatedInput['password']);
        $this->validatedInput['quota'] = str_replace(',' , '', $this->validatedInput['quota']);
    }
     
}
