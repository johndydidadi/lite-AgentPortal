<?php

namespace App\Http\Controllers;
use App\Rules\VerifyOldPassword;
use Auth;
use App\Agent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function showProfile(){

    	return view('agent.profile');

    }

    public function showChangePass(){

        return view('agent.changepass');
    }

    public function doChangePassword(Request $request){

        $request->validate([
                'old_password' => ['required',new VerifyOldPassword],
                'new_password' => 'required|min:8|same:old_password',
                'new_password_confirmation' => 'required|same:new_password'
            ],

            [
                'new_password_confirmation.same' => 'Passwords do not match',
                'old_password.same' => 'Passwords do not match'
            ]
            );

            $user = Auth::user()->update(['password'=>$request->new_password_confirmation]);

            Auth::logout()->redirect('/');
    }

}
