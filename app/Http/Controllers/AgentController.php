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
                'email' => ['required', Rule::unique('agents', 'email')->ignore($request->route('agent'))]
                // 'password' => 'required|min:8|confirmed',
                'quota' => 'required',

            ]
        ];
    }
    public function beforeUpdate()
    {
        $this->beforeStore();
    }
    public function beforeStore()
    {
<<<<<<< HEAD
    //     User::create([
    //         'firstname' => $this->validatedInput['firstname'],
    //         'middlename' => $this->validatedInput['middlename'],
    //         'lastname' => $this->validatedInput['lastname'],
    //         'email' => $this->validatedInput['email'],
    //         'role' => 'Agent',
    //         'username' => $this->validatedInput['email'],
    //         'password' => $this->validatedInput['password'],

    //     ]);
    // }

=======
        $this->validatedInput['quota'] = str_replace(',' , '', $this->validatedInput['quota']);
    }
    
>>>>>>> 6063d0e8ded496231b415ab8ab4f4f3e213c98ff
}
