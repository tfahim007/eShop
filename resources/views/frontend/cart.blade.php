@extends('layouts.front')
@section('title')
    My Cart
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">Home</a> /
            <a href="{{url('cart')}}">Cart</a>
            

        </h6>
    </div>
</div>
@php
    $total = 0;
@endphp
<div class="container my-5">
    <div class="card shadow ">
        @if ($cartitems->count() > 0)
            <div class="card-body">
                @foreach ($cartitems as $item)
                    <div class="row shadow mb-2 product_data">

                        <div class="col-md-2">
                            <img src="{{ asset('assets/uploads/product/'.$item->products->image)}}" style="width:100px;height:100px;" alt="Item Image">
                        </div>

                        <div class="col-md-5">
                            <h5>{{ $item->products->name }}</h5>
                        </div>

                        <div class="col-md-3 my-auto">

                            <input type="hidden" class="prod_data" value="{{ $item->prod_id}}">
                            @if ($item->products->qty > $item->prod_qty)

                                <label for="Quantity" >Quantity</label>
                                <div class="input-group text-center mb-3" style="width:120px">
                                    <button class="input-group-text changeQuantity decrement-btn">-</button>
                                    <input type="text" class="form-control qty-input text-center" value="{{$item->prod_qty}}">
                                    <button class="input-group-text changeQuantity increment-btn">+</button>
                                </div>

                            @else
                                <h6>Out of Stock</h6>
                            @endif
                            
                        </div>

                        <div class="col-md-2 mt-4">
                            <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i>Remove</button>
                        </div>
                        
                    </div>
                    @php
                        $total+= $item->products->original_price * $item->prod_qty;
                        
                    @endphp
                @endforeach
                    
                </div>
                <div class="card-footer">
                    <h6>
                        <div id="total">Total Price: Tk. {{$total}}</div>
                        <a href="{{url('checkout')}}" class="btn btn-success float-end">Checkout</a>
                    </h6>
                </div>
            </div>
        
            
        @else
            <div class="card-body text-center">
                <h2> Your <i class="fa fa-shopping-cart"> </i> Cart is Empty!</h2>
                <a href="{{url('category')}}"> <button class="btn btn-outline-primary float-end"> Continue Shopping</button></a>
            </div>
        @endif
    </div>
</div>
@endsection

