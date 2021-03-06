<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\CRUDController;
use Illuminate\Validation\Rule;
use App\User;
use DB;
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
                'password' => 'required|min:6',
                'role' => 'required',
                'quota' => 'nullable'
            ],
            'update' => [
                'username' => 'nullable|unique:users,username',
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

    public function beforeIndex($query)
    {
        $request=request();

        if($request->name){
            $result = str_replace(' ','',$request->name);
            $query->where(DB::raw("CONCAT(`firstname`,`middlename`,`lastname`)"),'like',"%{$result}%");
        }else if($request->email){

            $query->where(DB::raw("`email`"),'like',"%{$request->email}%");
        }else if($request->role){
            $query->where(DB::raw("`role`"),'like',"%{$request->role}%");
        }

    }


    public function beforeStore()
    {
        // $this->validatedInput['quota'] = str_replace(',' , '', $this->validatedInput['quota']);

        if(request()->role == 'Admin')
        {
            $this->validatedInput['quota'] = 0;

        }
        else if(request()->role == 'Agent')
        {
            $this->validatedInput['quota'] = str_replace(',' , '', $this->validatedInput['quota']);
        }
        if(request()->Admin == 'Admin')
        {
            $this->validatedInput['quota'] = 0;
        }
        else if(request()->Agent == 'Agent')
        {
             $this->validatedInput['quota'] = str_replace(',' , '', $this->validatedInput['quota']);
        }
       
    }

    public function beforeUpdate()
    {
        $this->beforeStore();
    }
     
}
