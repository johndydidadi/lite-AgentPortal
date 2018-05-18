<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomLoginController extends Controller
{
	public function showLoginPage()
	{
		return view('login');
	}

	public function login(Request $request)
	{
		$data = $request->validate([
			'username' => 'required|exists:users,username',
			'password' => 'required'
		], [
			'username.exists' => 'Username not found.'
		]);

		if(!Auth::attempt($data)) {
			return redirect()->route('get:login')->withErrors(['password' => 'Incorrect Password']);
		} else {
			return redirect()->route('get:dashboard:index');
		};
	}
}
