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
                    <table class="table table-bordered dynamic-table" id="dynamic_field"><!--parent-->
                        <thead><!--child of table, parent of tr-->
                            <tr><!--child of thead, descendant of table, parent of th-->
                                <th>Service</th><!--child of tr, sibling of th, descendant of thead and table -->
                                <th></th><!--sibling of th-->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{!! Form::selectGroup(null, 'services[]', $services) !!}</td>
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
                tr.find('select').val('');
                tr.appendTo($('.dynamic-table tbody'));

                $('select').change(function(){
                    if($(this).attr('id') == 'select' && $(this).val() == val('')){
                        $('select').not(this).prop('disabled', true).val('Disabled');
                    } else {
                        $('select').not(this).removeProp('disabled');
                        
                        $('select option').removeProp('disabled');
                        $('select').each(function(){
                            var val = $(this).val();
                            if(val != 'Default' || val != 'Disabled'){
                                $('select option[value="'+val+'"]').not(this).prop('disabled', true);
                            }
                        });
                    }
                });

            });


             $(document).on('click','.remove-line',function(e) {
                e.preventDefault();
                if ($('.dynamic-table tbody tr').length != 1) {
                     $(this).closest('tr').remove();
                } else {
                    $(this).closest('tr').find('select').val('');
                }
            });

<<<<<<< HEAD

=======
>>>>>>> 7a87e9cf3c379d97c67501cb63fe40b706727fd1
        });
    </script>
@endsection
