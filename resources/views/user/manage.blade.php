@extends('layouts.app')

@section('content')

	{!! Form::open (['action'=> 'UserController@store','method' => 'POST']) !!}
		{!! Form::inputGroup ('text', 'First Name', 'firstname') !!}
		{!! Form::inputGroup ('text', 'Last Name', 'lastname') !!}
		{!! Form::inputGroup ('email', 'E-mail', 'email') !!}
		{!! Form::inputGroup ('text', 'Username', 'username') !!}
		{!! Form::inputGroup ('password', 'Password', 'password') !!}
		{!! Form::selectGroup ('Role','role',['admin'=>'Admin', 'agent'=>'Agent']) !!}
		{!!	Form::submit('Submit') !!}
	{!! Form::close() !!}

@endsection