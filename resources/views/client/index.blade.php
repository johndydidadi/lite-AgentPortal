@extends('layouts.app')

@section('header')
    <h1 class="h2">Client</h1>
    <a class="btn btn-success btn-sm" href="{{ MyHelper::resource('create') }}"><i class="fas fa-plus"></i> New Client</a>
@endsection

@section('content')
    <div class="my-3 bg-white rounded box-shadow">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Company</th>
                <th scope="col">Representative</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
                <th scope="col">Nature Of Business</th>
                <th scope="col">Services</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($resourceList as $row)
                <tr>
                    <td scope="row">{{ $row->company  }}</td>
                    <td scope="row">{{ $row->representative }}</td>
                    <td scope="row">{{ $row->contact_number }}</td>
                    <td scope="row">{{ $row->address }}</td>
                    <td scope="row">{{ $row->nature_of_business }}</td>
                    <td scope="row">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#favoritesModal"><i class="fas fa-eye"></i> Services</button>

                        <div class="modal fade" id="favoritesModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <h4 class="modal-title" id="favoritesModalLabel">Services Availed</h4>
                                        </button>
                                    </div>
                                <div class="modal-body">
                                    <table class="table table-sm">
                                        <thead>
                                        
                                            <tr>
                                                <th scope="col">Service</th>
                                                <th scope="col">Type</th>
                                            </tr>
                                        
                                        </thead>
                                        <tbody>
                                           @foreach($resourceList as $row)
                                            <tr>
                                                <td>{{ $row->service }}</td>
                                                <td>{{ $row->payment_type }}</td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <span class="pull-right">
                                    </span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{!! Form::indexActions($row->id) !!}</td>
                </tr>
            @empty

            @endforelse
        </table>
        </tbody>
    </div>

    <script>
        $("form").submit(function(e){
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type: "POST",
                url : "http://laravel.test/ajax",
                data : form.serialize(),
                dataType : "json",
                success : function(data){
                    if(data.length > 0) {
                          console.log(data);
                        } else {
                          console.log('Nothing in the DB');
                        }
                    }
                }, "json");
            });
    </script>

@endsection

