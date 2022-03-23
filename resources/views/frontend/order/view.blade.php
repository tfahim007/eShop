@extends('layouts.front');
@section('title')
    Order Details
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-default">
                    <h3>Order Details</h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <div class="border p-2">{{ $orders->fname}} </div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $orders->lname}} </div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $orders->email}}</div>
                                <label for="">Phone</label>
                                <div class="border p-2">{{$orders->phone}}</div>
                                <label for="">Shipping Address</label>
                                <div class="border p-2">
                                    {{ $orders->address1}}, {{ $orders->address2}}, {{ $orders->city}}, {{ $orders->division}} 
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border p-2">{{ $orders->pincode}} </div>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td> {{$item->prod_qty}}</td>
                                                <td>{{$item->price}}</td>
                                                <td class="text-center">
                                                    <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" style="width:100px;" alt="Product Image">
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
    </div>
</div> 
@endsection

