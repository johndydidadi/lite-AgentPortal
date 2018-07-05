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