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
                    {!! Form::inputGroup('text', 'Company', 'company') !!}
                    {!! Form::inputGroup('text', 'Representative', 'representative') !!}
                    {!! Form::inputGroup('text', 'Contact Number', 'contact_number') !!}
                    {!! Form::inputGroup('text', 'Address', 'address') !!}
                    {!! Form::inputGroup('text', 'Nature Of Business', 'nature_of_business') !!}
                    <table class="table table-bordered dynamic-table" id="dynamic_field">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse($resourceData->services as $row)

                                    <tr>
                                        {!! Form::hidden("services[$loop->index][id]", $row->id) !!}
                                        <td>{!! Form::selectGroup(null, 'services[$loop->index][service]', $services,$row->id) !!}</td>
                                        <td>
                                            <button class="btn btn-danger remove-line"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><button type="button" class="btn btn-primary add-line"><i class="fa fa-plus"></i> Add new service</button></td>
                                </tr>
                            </tfoot>
                    </table>
                @else
                    {!! Form::open(['url' => Myhelper::resource('store'), 'method' => 'post']) !!}
                    {!! Form::inputGroup('text', 'Company', 'company') !!}
                    {!! Form::inputGroup('text', 'Representative', 'representative') !!}
                    {!! Form::inputGroup('text', 'Contact Number', 'contact_number') !!}
                    {!! Form::inputGroup('text', 'Address', 'address') !!}
                    {!! Form::inputGroup('text', 'Nature Of Business', 'nature_of_business') !!}
                    <table class="table table-bordered dynamic-table" id="dynamic_field">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th></th>
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
                @endif    

                <hr>
                    
                         <button class="btn btn-sm {{ $resourceData->id ? 'btn-outline-info' : 'btn-outline-success' }}">
                            {{ $resourceData->id ? 'Update' : 'Create' }}
                         </button>
                        <br>
                {!! Form::close() !!}
            </div>
        </div>  
    </div>

    <script>
        $(document).ready(function(){

            $('.add-line').click(function(){
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

                // $('select').change(function(){
                //     if ($('select option[value="' + $(this).val() + '"]:selected').length > 1){
                //         $(this).val(0);
                //         alert('Service already availed! Please choose another.');
                //     }
                // });
            });

            $(document).on('click','.remove-line',function(e) {
                e.preventDefault();
                if ($('.dynamic-table tbody tr').length != 1) {
                     $(this).closest('tr').remove();
                } else {
                    $(this).closest('tr').find('select').val('');
                }
            });

        

        });
    </script>
@endsection
