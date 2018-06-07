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
                    {!! Form::open(['url' => Myhelper::resource('store'), 'method' => 'post']) !!}
                @endif
                {!! Form::inputGroup('text', 'Company', 'company') !!}
                {!! Form::inputGroup('text', 'Representative', 'representative') !!}
                {!! Form::inputGroup('text', 'Contact Number', 'contact_number') !!}
                {!! Form::inputGroup('text', 'Address', 'address') !!}
                {!! Form::inputGroup('text', 'Nature Of Business', 'nature_of_business') !!}
                <hr>
             <!--    <button class="btn btn-sm {{ $resourceData->id ? 'btn-outline-info' : 'btn-outline-success' }}">
                    {{ $resourceData->id ? 'Update' : 'Create' }}
                </button> -->
                    <table class="table table-bordered dynamic-table" id="dynamic_field">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{!! Form::selectGroup(null, 'services', $services) !!}</td>
                                <td>
                                    <button class="btn btn-danger remove-line"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><button type="button" class="btn btn-primary add-line"><i class="fa fa-plus"></i> Add new service</button></td>
                            </tr>
                        </tfoot>
                    </table>
                        <button id="submit" type="submit" class="btn btn-outline-success btn-sm">Submit</button>
                        <br>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>  
    </div>

    <script>
         $(document).ready(function(){
            $('.add-line').click(function () {
                var tr = $('.dynamic-table tbody tr:first').clone();
                tr.find('select').val('')
                tr.appendTo($('.dynamic-table tbody'))
                count++;
            })

            $(document).on('click','.remove-line',function() {
                if ($('.dynamic-table tbody tr').length != 1) {
                     $(this).closest('tr').remove();
                }
            });
        });

    </script>
@endsection
