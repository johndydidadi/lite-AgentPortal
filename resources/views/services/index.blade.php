@extends('layouts.app')

@section('header')
    <h1 class="h2">Services</h1>
    <a class="btn btn-success btn-sm" href="{{ MyHelper::resource('create') }}"><i class="fas fa-plus"></i> New Service</a>
@endsection

@section('content')
    <div class="my-3 bg-white rounded box-shadow">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Service</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($resourceList as $row)
                <tr>
                    <td scope="row">{{ $row->service  }}</td>
                    <td scope="row">{{ $row->price }}</td>
                    <td>{!! Form::indexActions($row->id) !!}</td>
                </tr>
            @empty

            @endforelse
        </table>
        </tbody>
    </div>
@endsection

