@extends('layouts.admin')
@section('title')
    History
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-gradient-light">
                        <h3>
                            Completed Orders
                            <a href="{{url('orders')}}" class="btn btn-success float-end"> New Orders</a>

                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Order Date</th>
                                    <th>Tracking No.</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td>{{($item->created_at) }}</td>
                                            <td>{{ $item->tracking_no}}</td>
                                            <td>{{ $item->total}}</td>
                                            <td>{{ $item->status==0?'Pending':'Completed'}}</td>
                                            <td class="text-center">
                                                <a href=" {{url('admin/view-order/'.$item->id)}}"><button class="btn btn-primary "> View </button></a>
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