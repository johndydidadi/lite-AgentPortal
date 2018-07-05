@extends('layouts.app')

@section('header')
    <h1 class="h2">{{ $resourceData->id ? "Edit: $resourceData->service" : 'New Service' }}</h1>
    <a class="btn btn-danger btn-sm" href="{{ MyHelper::resource('create') }}"><i class="fas fa-arrow-left "></i> Back to list</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="my-3 p-3 bg-white rounded box-shadow card">
                @if($resourceData->id)
                    {!! Form::model($resourceData, ['url' => MyHelper::resource('update', ['id' => $resourceData->id]), 'method' => 'patch']) !!}
                @else
                    {!! Form::open(['url' => Myhelper::resource('store'), 'method' => 'post']) !!}
                @endif
                {!! Form::inputGroup('text', 'Service Name', 'service') !!}
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {{-- {!! Form::inlineRadio('payment_type', 'subscription', 'Subscription', null, ['class' => 'payment_type', 'id' => 'payment_type']) !!} --}}
                        {!! Form::selectGroup('Service Name','payment_type', ['' => 'Select Type', 'one_time_payment' => 'One Time Payment', 'subscription' => 'Subscription'], null, ['class' => 'payment_type', 'id' => 'payment_type']) !!}
                    </div>
                    {{-- <div class="col-md-6">
                        {!! Form::inlineRadio('payment_type', 'one_time_payment', 'One Time Payment', null, ['class' => 'payment_type', 'id' => 'payment_type']) !!}
                    </div> --}}
                </div><br>

                <div class="row">
                    <div class="col-md-6">
                        {!! Form::inputGroup('text', 'Annual Price', 'annual_price', $resourceData->annual_price ?? 0.00, ['class' => 'price subscription']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::inputGroup('text', 'Price', 'otp_price', $resourceData->otp_price ?? 0.00, ['class' => 'price', 'id' => 'OTP']) !!}   
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Form::inputGroup('text', 'Semi-Annual Price', 'semi_annual_price', $resourceData->semi_annual_price ?? 0.00, ['class' => 'price subscription']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Form::inputGroup('text', 'Quarterly Price', 'quarterly_price', $resourceData->quarterly_price ?? 0.00, ['class' => 'price subscription']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Form::inputGroup('text', ' Monthly Price', 'monthly_price', $resourceData->monthly_price ?? 0.00, ['class' => 'price subscription']) !!}
                    </div>
                </div>

                <hr>
                
                <button class="btn btn-sm {{ $resourceData->id ? 'btn-outline-info' : 'btn-outline-success' }}">
                    {{ $resourceData->id ? 'Update' : 'Create' }}
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

