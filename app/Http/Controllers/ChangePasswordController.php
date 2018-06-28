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
        
        if(Auth::user()->role=='Admin'){
            return view('admin.profile');
        }else{
            return view('agent.profile');
        }    
    	   
    }

    public function showChangePass(){

        if(Auth::user()->role=='Admin'){
            return view('admin.changepass');
        }else{
            return view('agent.changepass');
        }          
       
    }

    public function doChangePassword(Request $request){

        $request->validate([
                'old_password' => ['required',new VerifyOldPassword],
                'new_password' => 'required|min:8|different:old_password',
                'new_password_confirmation' => 'required|same:new_password'
            ],

            [
                'new_password_confirmation.same' => 'Passwords do not match',
                'new_password.different' => 'Password must be different'
            ]
            );

            $user = Auth::user()->update(['password'=>$request->new_password_confirmation]);

            Auth::logout();
            return redirect()->route('get:login');
    }

}
