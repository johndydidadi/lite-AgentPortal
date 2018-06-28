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
                'email' => 'required|unique:admins,email',
                'password' => 'required|min:8',
                'role' => 'required|unique:users,user',
                'quota' => 'required'
            ],
            'update' => [
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
                'quota' => 'required'
            ]
        ];

    }

    public function beforeStore()
    {
        $this->validatedInput['password'] = bcrypt($this->validatedInput['password']);
        // $this->validatedInput['quota'] = str_replace(',' , '', $this->validatedInput['quota']);

        if(request()->role == 'Admin')
        {
            $this->validatedInput['quota'] = 0;

        }
        else if(request()->role == 'Agent')
         {
                $this->validatedInput['quota'] = str_replace(',' , '', $this->validatedInput['quota']);

        }
    }

    //     public function getFullnameAttribute()
    // {
    //    // return "{$this->firstname} {$this->middlename[0]} {$this->lastname}";

    //     return ucfirst($this->first_name) . ' ' . ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    // }
     
}
