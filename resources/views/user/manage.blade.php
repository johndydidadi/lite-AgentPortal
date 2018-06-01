@extends('layouts.app')

@section('content')
	
	@if($resourceData->id)
        {!! Form::model($resourceData, ['url' => MyHelper::resource('update', ['id' => $resourceData->id]), 'method' => 'patch']) !!}
    @else
        {!! Form::open (['url' => Myhelper::resource('store'), 'method' => 'post']) !!}
    @endif
		{!! Form::inputGroup ('text', 'First Name', 'firstname') !!}
		{!! Form::inputGroup ('text', 'Last Name', 'lastname') !!}
		{!! Form::inputGroup ('email', 'E-mail', 'email') !!}
		{!! Form::inputGroup ('text', 'Username', 'username') !!}
		{!! Form::inputGroup ('password', 'Password', 'password') !!}
		{!! Form::selectGroup ('Role','role',['admin'=>'Admin', 'agent'=>'Agent']) !!}
		{!!	Form::submit('Submit') !!}
	{!! Form::close() !!}

@endsection