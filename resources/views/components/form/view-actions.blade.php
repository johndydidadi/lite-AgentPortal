<a href="{{ MyHelper::resource('show', compact('id')) }}" class="btn btn-outline-info btn-sm">
    <i class="fas fa-search"></i> Show
</a>

{!! Form::open(['url'=> MyHelper::resource('destroy', compact('id')), 'method'=> 'DELETE', 'style' => 'display: inline-block']) !!}
  	<a class="btn btn-outline-danger btn-sm trash-row" href="#">
        <span class="fas fa-trash"></span> Delete
    </a>
{!! Form::close()!!}