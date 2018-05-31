@extends('layouts.app')

@section('header')
	<h1 class="h2">Users</h1>
    <a class="btn btn-success btn-sm" href="{{ MyHelper::resource('create') }}"><i class="fas fa-plus"></i> New User</a>
@endsection

@section('content')
    <div class="my-3 bg-white rounded box-shadow">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            	@forelse($resourceList as $row)
            		<tr>
            			<td scope="row">{{$row->firstname}}</td>
            			<td scope="row">{{$row->lastname}}</td>
            			<td scope="row">{{$row->email}}</td>
            			<td scope="row">{{$row->username}}</td>
            			<td scope="row">{{$row->role}}</td>
            			<td>{!! Form::indexActions($row->id) !!}</td>
            		</tr>
            	@empty

            	@endforelse
            </tbody>
        </table>
        
    </div>
	

@endsection