@extends('layouts.app')

@section('header')
    <h1 class="h2">Services</h1>
    <a class="btn btn-success btn-sm" href="{{ MyHelper::resource('create') }}"><i class="fas fa-plus"></i> New Service</a>
@endsection

@section('content')
    <div class="card">
    <h5>One Time Payment</h5> 
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
                        @if($row->payment_type == 'one_time_payment')
                            <tr>
                                <td scope="row">{{ $row->service  }}</td>
                                <td scope="row" class="price">{{ $row->otp_price }}</td>
                                <td>{!! Form::indexActions($row->id) !!}</td>
                            </tr>
                        @endif
                    @empty   
                    @endforelse
                </tbody>                    
            </table>
        </div>
    </div>

    <hr>

    <div class="card">
    <h5>Subscriptions</h5> 
        <div class="my-3 bg-white rounded box-shadow">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Service</th>
                        <th scope="col">Annual</th>
                        <th scope="col">Semi Quarterly</th>
                        <th scope="col">Quarterly</th>
                        <th scope="col">Monthly</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($resourceList as $row)
                        @if($row->payment_type == 'subscription')    
                        <tr>
                            <td scope="row">{{ $row->service }}</td>
                            <td scope="row" class="price">{{ $row->annual_price }}</td>
                            <td scope="row" class="price">{{ $row->semi_quarterly_price }}</td>
                            <td scope="row" class="price">{{ $row->quarterly_price }}</td>
                            <td scope="row" class="price">{{ $row->monthly_price }}</td>
                            <td>{!! Form::indexActions($row->id) !!}</td>
                        </tr>
                        @endif      
                     @empty   
                    @endforelse
                </tbody>                    
            </table>
        </div>
    </div>
@endsection

