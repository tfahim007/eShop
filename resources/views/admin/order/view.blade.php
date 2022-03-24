@extends('layouts.admin')
@section('title')
    View Order Details
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-light">
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
                                <h6 class= 'px-2'>Grand Total: <span class="float-end">Tk. {{$orders->total}}</span></h6>

                                <div class="mt-5 px-2">

                                    <form action="{{url('update-order/'.$orders->id)}}" method="PUT">
                                        @csrf
                                        @method('PUT')
                                        <label for=""> Order Status</label>
                                        <select name="order-status" class="form-select">
                                            <option {{ $item->status==0?'selected':''}} value="0">Pending</option>
                                            <option {{ $item->status==1?'selected':''}} value="1"> Completed</option>
                                        </select>
                                        
                                        <button type="submit" class="btn btn-primary float-end mt-3"> Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection