@extends('layouts.front')
@section('title')
    My Wishlist
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">Home</a> /
            <a href="{{url('wishlist')}}">Wishlist</a>
            

        </h6>
    </div>
</div>
@php
    $total = 0;
@endphp
<div class="container my-5">
    <div class="card shadow wishlistitem ">
        <div class="card-header bg-gradient-light">
            <h2>Wishlist Items</h2>
        </div>
        @if ($wishlists->count() > 0)
            <div class="card-body">
                @foreach ($wishlists as $item)
                    <div class="row shadow mb-2 product_data">

                        <div class="col-md-2">
                            <img src="{{ asset('assets/uploads/product/'.$item->products->image)}}" style="width:100px;height:100px;" alt="Item Image">
                        </div>

                        <div class="col-md-3">
                            <h5>{{ $item->products->name }}</h5>
                        </div>

                        <div class="col-md-3 my-auto">
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id}}">
                            @if ($item->products->qty > $item->prod_qty)
                                <h6>In Stock</h6>
                            @else
                                <h6>Out of Stock</h6>
                            @endif
                            
                        </div>

                        <div class="col-md-2 mt-4">

                            <button class="btn btn-success addToCartBtn">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                            {{-- <button class="btn btn-danger delete-wishlist-item"><i class="fa fa-trash"></i>Remove</button> --}}
                        </div>
                        <div class="col-md-2 mt-4">
                            <button class="btn btn-danger delete-wishlist-item"><i class="fa fa-trash"></i>Remove</button>


                        </div>
                        
                    </div>
                    
                @endforeach  
                
                
            </div>
        
            
        @else
            <div class="card-body text-center">
                <h2> Your <i class="fa fa-heart"> </i> Wishlist is Empty!</h2>
                <a href="{{url('category')}}"> <button class="btn btn-outline-primary float-end"> Continue Shopping</button></a>
            </div>
        @endif
    </div>
</div>
@endsection

