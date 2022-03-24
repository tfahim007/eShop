@extends('layouts.front')
@section('title')
    Checkout
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">Home</a> /
            <a href="{{url('checkout')}}">Checkout</a>

        </h6>
    </div>
</div>

@php
    $total =0 ;
@endphp
<div class="container">
    <div class="row mt-4">
        
        <div class="col-md-7">
            <form action="place-order" method="POST">
                @csrf
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="fname" value={{Auth::user()->name}} placeholder="Enter First Name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="lname" value={{Auth::user()->lname}}  placeholder="Enter Last Name">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value={{Auth::user()->email}}  placeholder="Enter Email ID">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control" name="phone"  value={{Auth::user()->phone}}  placeholder="Enter Phone No.">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address1"  value={{Auth::user()->address1}} placeholder="Enter Address">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 2</label>
                            <input type="text" class="form-control" name="address2"  value={{Auth::user()->address2}} placeholder="Enter Address 2">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="city"  value={{Auth::user()->city}} placeholder="Enter City">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Division</label>
                            <input type="text" class="form-control" name="division"  value={{Auth::user()->division}} placeholder="Enter Division">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Country</label>
                            <input type="text" class="form-control" name="country"  value={{Auth::user()->country}} placeholder="Enter Country">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Pin Code</label>
                            <input type="text" class="form-control" name="pincode"   value={{Auth::user()->pincode}} placeholder="Enter Pin Code">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            
                
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collections as $item)
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->prod_qty}}</td>
                                        <td>{{$item->products->selling_price}}</td>
                                    </tr>

                                    @php
                                        $quantity = (int) $item->prod_qty;
                                        $price = (int) $item->products->selling_price;
                                        $total+= $quantity * $price;

                                    @endphp
                                @endforeach
                                
                            </tbody>
                        </table>
                        <hr>
                        <h6 class="mb-3 float-end">Total: {{$total}} Tk.</h6>
                        <button type="submit" class="btn btn-primary w-100"> Place Order</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection