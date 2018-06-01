@extends('layouts.app')

@section('header')
    <h1 class="h2">{{ $resourceData->id ? "Edit: $resourceData->name" : 'New Client' }}</h1>
    <a class="btn btn-danger btn-sm" href="{{ MyHelper::resource('index') }}"><i class="fas fa-arrow-left "></i> Back to list</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="my-3 p-3 bg-white rounded box-shadow">
                @if($resourceData->id)
                    {!! Form::model($resourceData, ['url' => MyHelper::resource('update', ['id' => $resourceData->id]), 'method' => 'patch']) !!}
                @else
                    {!! Form::open(['url' => Myhelper::resource('store'),'class' => 'ajax', 'method' => 'post']) !!}
                @endif
                {!! Form::inputGroup('text', 'Company', 'company') !!}
                {!! Form::inputGroup('text', 'Representative', 'representative') !!}
                {!! Form::inputGroup('text', 'Contact Number', 'contact_number') !!}
                {!! Form::inputGroup('text', 'Address', 'address') !!}
                {!! Form::inputGroup('text', 'Nature Of Business', 'nature_of_business') !!}
                {!! Form::selectGroup ('Service','services',$services) !!}
               
                <hr>
                <button class="btn btn-sm {{ $resourceData->id ? 'btn-outline-info' : 'btn-outline-success' }}">
                    {{ $resourceData->id ? 'Update' : 'Create' }}
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

