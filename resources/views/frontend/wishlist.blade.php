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
    <div class="card shadow ">
        @if ($wishlists->count() > 0)
            <div class="card-body">
              <h1> ther</h1>   
                
                
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

