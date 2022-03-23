@extends('layouts.front');
@section('title')
    Orders
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>My Orders</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Tracking No.</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td>{{ $item->tracking_no}}</td>
                                            <td>{{ $item->total}}</td>
                                            <td>{{ $item->status==0?'Pending':'Completed'}}</td>
                                            <td class="text-center">
                                                <a href=" {{url('view-order/'.$item->id)}}"><button class="btn btn-primary "> View </button></a>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection

