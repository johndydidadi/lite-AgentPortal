@extends('layouts.app')

@section('header')
    <h1 class="h2">{{ $resourceData->id ? "Edit: $resourceData->name" : 'New User' }}</h1>
    <a class="btn btn-danger btn-sm" href="{{ MyHelper::resource('index') }}"><i class="fas fa-arrow-left "></i> Back to list</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="my-3 p-3 bg-white rounded box-shadow">
                @if($resourceData->id)
                    {!! Form::model($resourceData, ['url' => MyHelper::resource('update', ['id' => $resourceData->id]), 'method' => 'patch']) !!}

                {!! Form::inputGroup('text', 'First Name', 'firstname') !!}
                {!! Form::inputGroup('text', 'Middle Name', 'middlename') !!}
                {!! Form::inputGroup('text', 'Last Name', 'lastname') !!}
                {!! Form::inputGroup('text', 'Address', 'address') !!}
                {!! Form::selectGroup('Gender', 'gender', ['' => 'Select type', 'Male' => 'Male', 'Female' => 'Female']) !!}
                {!! Form::inputGroup('date', 'Birth Date', 'birth_date') !!}
                {!! Form::inputGroup('text', 'Contact Number', 'contact_number') !!}
                {!! Form::inputGroup('email', 'Email', 'email') !!}
                {!! Form::inputGroup('hidden', null, 'password')!!}
                {!! Form::inputGroup('text', 'Quota', 'quota', $resourceData->quota ?? 0.00 , ['class'=> 'price']) !!}
                
                @else
                    {!! Form::open(['url' => Myhelper::resource('store'), 'method' => 'post']) !!}

                {!! Form::inputGroup('text', 'First Name', 'firstname') !!}
                {!! Form::inputGroup('text', 'Middle Name', 'middlename') !!}
                {!! Form::inputGroup('text', 'Last Name', 'lastname') !!}
                {!! Form::inputGroup('text', 'Address', 'address') !!}
                {!! Form::selectGroup('Gender', 'gender', ['' => 'Select type', 'Male' => 'Male', 'Female' => 'Female']) !!}
                {!! Form::inputGroup('date', 'Birth Date', 'birth_date') !!}
                {!! Form::inputGroup('text', 'Contact Number', 'contact_number') !!}
                {!! Form::inputGroup('email', 'Email', 'email') !!}
                {!! Form::selectGroup('Role','role',['' => 'Select Type', 'admin' => 'Admin', 'agent' => 'Agent'], null, ['class' => 'role', 'id' => 'role']) !!}
                 {!! Form::inputGroup('text', 'Quota', 'quota', $resourceData->quota ?? 0.00 , ['class'=> 'price']) !!}
                <br>
                <hr>
                <br>
                {!! Form::inputGroup('username', 'Username', 'username')!!}
                {!! Form::inputGroup('password', 'Password', 'password')!!}
               
                @endif

                <hr>
                <button class="btn btn-sm {{ $resourceData->id ? 'btn-outline-info' : 'btn-outline-success' }}">
                    {{ $resourceData->id ? 'Update' : 'Create' }}
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

