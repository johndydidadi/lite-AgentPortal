<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\CRUDController;
use Illuminate\Validation\Rule;
use App\Admin;
use App\User;
class AdminController extends CRUDController
{
    public function __construct(Admin $model, Request $request){
        parent::__construct();

        $this->resourceModel = $model;
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
                'quota' => 'required',
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
                'email' => ['required', Rule::unique('admins', 'email')->ignore($request->route('admin'))],
                'quota' => 'required'

            ]
        ];
    }

    public function beforeUpdate()
    {
        $this->beforeStore();
    }

    public function afterStore($model)
    {
        $model->user()->create([
            'username' => $this->validatedInput['email'],
            'password' => $this->validatedInput['password'],
            'role' => 'Admin'
        ]);
    }

    public function beforeStore()
    {
        $this->validatedInput['quota'] = str_replace(',' , '', $this->validatedInput['quota']);
    }
         
}
