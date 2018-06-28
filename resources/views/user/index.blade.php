@extends('layouts.app')

@section('header')
	<h1 class="h2">Users</h1>
@endsection

@section('content')
    <div class="my-3 bg-white rounded box-shadow">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
            </tr>
            </thead>
            <tbody>
            	@forelse($resourceList as $row)
            		<tr>
            			<td scope="row">{{$row->admin->fullname}}</td>
            			<td scope="row">{{$row->admin->email}}</td>
            			<td scope="row">{{$row->username}}</td>
            			<td scope="row">{{$row->role}}</td>
            		</tr>
            	@empty

            	@endforelse
            </tbody>
        </table>
        
    </div>
	

@endsection