@extends('layouts.app')

@section('header')
    <h1 class="h2">{{ $resourceData->id ? "Edit: $resourceData->name" : 'New User' }}</h1>
    <a class="btn btn-danger btn-sm" href="{{ MyHelper::resource('index') }}"><i class="fas fa-arrow-left "></i> Back to list</a>
@endsection

@section('content')
<!-- @json($errors->all()) -->
    <div class="row">
        <div class="col-md-6">
            <div class="my-3 p-3 bg-white rounded box-shadow">
                @if($resourceData->id)
                    {!! Form::model($resourceData, ['url' => MyHelper::resource('update', ['id' => $resourceData->id]), 'method' => 'patch']) !!}
                    {!! Form::inputGroup('username', 'Username', 'username')!!}
                 @else
                {!! Form::open(['url' => Myhelper::resource('store'), 'method' => 'post']) !!} 
                    {!! Form::inputGroup('username', 'Username', 'username')!!}
                    {!! Form::inputGroup('password', 'Password', 'password')!!}
                @endif
                

                {!! Form::inputGroup('text', 'First Name', 'firstname') !!}
                {!! Form::inputGroup('text', 'Middle Name', 'middlename') !!}
                {!! Form::inputGroup('text', 'Last Name', 'lastname') !!}
                {!! Form::inputGroup('text', 'Address', 'address') !!}
                {!! Form::selectGroup('Gender', 'gender', ['' => 'Select type', 'Male' => 'Male', 'Female' => 'Female']) !!}
                {!! Form::inputGroup('date', 'Birth Date', 'birth_date') !!}
                {!! Form::inputGroup('text', 'Contact Number', 'contact_number') !!}
                {!! Form::inputGroup('email', 'Email', 'email') !!}
                {!! Form::selectGroup('Role','role',['' => 'Select Type', 'Admin' => 'Admin', 'Agent' => 'Agent'], $resourceData->role, ['class' => 'role', 'id' => 'role']) !!}
                 {!! Form::inputGroup('text', 'Quota', 'quota', $resourceData->quota ?? 0.00 , ['class'=> 'price']) !!}
                <hr>
                <button class="btn btn-sm {{ $resourceData->id ? 'btn-outline-info' : 'btn-outline-success' }}">
                    {{ $resourceData->id ? 'Update' : 'Create' }}
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

