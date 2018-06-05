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
                <hr>
                <button class="btn btn-sm {{ $resourceData->id ? 'btn-outline-info' : 'btn-outline-success' }}">
                    {{ $resourceData->id ? 'Update' : 'Create' }}
                </button>
                {!! Form::close() !!}
            </div>
            <div class="my-3 p-3 bg-white rounded box-shadow">
                {!! Form::open([ 'id' => 'add_service']) !!}
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td>{!! Form::selectGroup('Service', 'services', $services) !!}</td>
                            <td><button name="add" id="add" class="btn btn-outline-success btn-sm">Add</button></td>
                        </tr>
                    </table>
                    <button id="submit" class="btn btn-outline-success btn-sm">Submit</button>
                    <br>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            var i = 1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td>{!! Form::selectGroup("Service", "services", $services) !!}</td><td><button name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove btn-sm">X</button></td></tr>');
            });
            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });
            $('#submit').click(function(){
                $.ajax({
                    url:"#",
                    method:"POST",
                    data:$('#add_service').serialize(),
                    success:function(data){
                        alert(data);
                        $('#add_service')[0].reset(); 
                    }
                });
            });
        });
    </script>
@endsection

