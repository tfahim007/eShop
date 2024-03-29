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
                    <h3>Order Details
                        <a href="{{url('my-orders')}}"><button class="btn btn-primary-outline float-end">Back</button></a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border p-2">{{ $orders->fname}} </div><br>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $orders->lname}} </div><br>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $orders->email}}</div><br>
                                <label for="">Phone</label>
                                <div class="border p-2">{{$orders->phone}}</div><br>
                                <label for="">Shipping Address</label>
                                <div class="border p-2">
                                    {{ $orders->address1}}, {{ $orders->address2}}, {{ $orders->city}}, {{ $orders->division}} 
                                </div><br>
                                <label for="">Zip Code</label>
                                <div class="border p-2">{{ $orders->pincode}} </div>
                            </div><br>
                            <div class="col-md-6">
                                <h4>Order Items</h4>
                                <hr>
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
                                <h5>Grand Total: <span class="float-end">Tk. {{$orders->total}}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection

