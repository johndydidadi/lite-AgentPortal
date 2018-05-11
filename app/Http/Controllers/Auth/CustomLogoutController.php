<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomLogoutController extends Controller
{
	public function logout()
	{
		Auth::logout();

		return redirect()->route('get:login');
	}
}
