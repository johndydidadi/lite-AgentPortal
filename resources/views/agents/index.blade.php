@extends('layouts.app')

@section('header')
    <h1 class="h2">Agent</h1>
    <a class="btn btn-success btn-sm" href="{{ MyHelper::resource('create') }}"><i class="fas fa-plus"></i> New Agent</a>
@endsection

@section('content')

    <div class="my-3 bg-white rounded box-shadow">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Gender</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($resourceList as $row)
                <tr>
                    <td scope="row">{{ ucwords($row->firstname) . ucwords($row->middlename) . ucwords($row->lastname)  }}</td>
                    <td scope="row">{{ $row->address }}</td>
                    <td scope="row">{{ ucfirst($row->gender) }}</td>
                    <td scope="row">{{ $row->birth_date}}</td>
                    <td scope="row">{{ $row->contact_number }}</td>
                    <td scope="row">{{ $row->email }}</td>
                    <td>{!! Form::indexActions($row->id) !!}</td>
                </tr>
            @empty

            @endforelse
        </table>
        </tbody>
    </div>
@endsection