
	{!! Form::open(['method'=>'GET','url'=>'users','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
		<div class="form-inline">
				{!! Form::inputGroup('text',null, 'lastname' ,null , ['class' => 'form-group' , 'placeholder' => 'Lastname']) !!}
				{!! Form::inputGroup('email',null, 'firstname',null , ['class' => 'form-group' , 'placeholder' => 'Email']) !!}
				{!! Form::selectGroup(null,'role',['' => 'Select Type', 'Admin' => 'Admin', 'Agent' => 'Agent'], null, ['class' => 'role']) !!}
		    <button class="btn btn-default" type="submit">
		            <i class="fa fa-search"></i>
		    </button>
		 
		</div>
	{!! Form::close() !!}


