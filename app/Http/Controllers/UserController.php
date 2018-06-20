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
            	'firstname' => 'required',
            	'lastname' => 'required',
            	'username' => 'required',
            	'email' => 'required',
            	'role' => 'required',
            	'password' => 'required'
            ]
        ];
    }

    public function beforeStore()
    {
        $this->validatedInput['password'] = bcrypt($this->validatedInput['password']);
    }
     
}
