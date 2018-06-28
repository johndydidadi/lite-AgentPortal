@extends('layouts.app')

@section('header')
	<h1 class="h2">Change Password</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="my-3 p-3 bg-white rounded box-shadow">
				{!! Form::open(['url' => route('post:doUpdate'), 'method' => 'patch']) !!}
					{!! Form::inputGroup('password', 'Old Password', 'old_password') !!}

					{!! Form::inputGroup('password', 'New Password', 'new_password') !!}
					{!! Form::inputGroup('password', 'Confirm New Password', 'new_password_confirmation') !!}

					<button class="btn btn-sm btn-outline-info">
					Update
					</button>
				{!! Form::close()!!}				
			</div>
		</div>
	</div>



@endsection