@extends('layouts.app')

@section('header')
	<h1 class="h2">Admin Profile</h1>
@endsection

@section('content')

	<div class="row">
        <div class="col-md-6">
            <h4>General Information</h4>
            <div class="my-3 p-3 bg-white rounded box-shadow">
                <form class="form-group">
                    <div class="form-group row">
                        <label class="col-sm-2 col-xs-4"><b>Name</b></label>
                        <p class="col-sm-4 col-xs-8">{{ Auth::user()->fullname }}</p>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-xs-4"><b>Email</b></label>
                        <p class="col-sm-4 col-xs-8">{{ Auth::user()->email }}</p>
                    </div>                    
                </form>

            	<a href="{{ route('get:updatePass')}}" class="btn-sm btn-info">Change Password</a>
            </div>
        </div>
    </div>

@endsection

