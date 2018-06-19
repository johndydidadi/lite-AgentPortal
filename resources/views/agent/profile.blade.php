@extends('layouts.app')

@section('header')
	<h1 class="h2">Agent Profile</h1>
@endsection

@section('content')

	<div class="row">
        <div class="col-md-6">
            <div class="my-3 p-3 bg-white rounded box-shadow">

            	<h1>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h1>
            	<br>
            	<h2>{{Auth::user()->email}}</h2>

            	<a href="{{ route('get:updatePass')}}" class="btn btn-info">Change Password</a>
            </div>
        </div>
    </div>

@endsection

