@extends('layouts.app')

@section('page-header')
	<h1 class="h2">{{ $resourceData->id ? "Edit: $resourceData->name" : 'Reset Password' }}</h1>
@endsection

@section('page-content')
				@if($resourceData->id)
	                {!! Form::model($resourceData, ['url' => MyHelper::resource('update', ['id' => $resourceData->id]), 'method' => 'patch']) !!}
	                {!! Form::inputGroup('password', 'Password', 'password') !!}
	                {!! Form::inputGroup('password', 'Confirm Password', 'representative') !!}
                @endif

@endsection

