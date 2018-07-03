<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use \Request;
class SearchController extends Controller
{
    public function search(){
    	$search = \Request::get('lastname'); //<-- we use global request to get the param of URI
 
        $users = User::where('lastname','like','%'.$search.'%')
        ->orderBy('lastname')
        ->paginate(20);
        
        return view('users',compact('users'));
      
    }
