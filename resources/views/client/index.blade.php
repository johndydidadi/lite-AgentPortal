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
                <th scope="col">Service</th>
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
                    <td scope="row">{{ $row->services }}</td>
                    <td>{!! Form::indexActions($row->id) !!}</td>
                </tr>
            @empty

            @endforelse
        </table>
        </tbody>
    </div>
@endsection

