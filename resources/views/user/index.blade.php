@extends('layouts.app')

@section('header')
	<h1 class="h2">Users</h1>
    <a class="btn btn-success btn-sm" href="{{ MyHelper::resource('create') }}"><i class="fas fa-plus"></i> New User</a>
@endsection

@section('content')
<!-- @include('search',['url'=>'users','link'=>'users']) -->
{!! Form::open(['method'=>'GET','url'=>url()->current(),'class'=>'navbar-form navbar-left'])  !!}


<div class="form-inline">
    {!! Form::inputGroup('text',null, 'name' ,null , ['class' => 'form-group' , 'placeholder' => 'Name']) !!}
    {!! Form::inputGroup('email',null, 'email',null , ['class' => 'form-group' , 'placeholder' => 'Email']) !!}
    {!! Form::selectGroup(null,'role',['' => 'Select Type', 'Admin' => 'Admin', 'Agent' => 'Agent'], null, ['class' => 'role']) !!}
    <button class="btn btn-default" type="submit">
            <i class="fa fa-search"></i>
    </button>
   
</div>
{!! Form::close() !!}
    <div class="my-3 bg-white rounded box-shadow">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Username</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($resourceList as $row)
                    
                        <tr>
                            <td scope="row">{{$row->fullname}}</td>
                            <td scope="row">{{$row->email}}</td>
                            <td scope="row">{{$row->username}}</td>
                            <td scope="row">{!! Form::indexActions($row->id) !!}</td>      
                        </tr>
  
                @empty
                @endforelse
            </tbody>
        </table>
    </div>       
    </div>

@endsection