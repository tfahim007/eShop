@extends('layouts.front')
@section('title')
    {{$product->name}}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                Collections/{{ $product->category->name }}/{{ $product->name}}
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card-shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/product/'.$product->image)}}" class="w-100" alt="{{ $product->name}}">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                            @if ($product->trending==1)
                                <label style="font-size:16px" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                            
                        </h2>
                        <hr>
                        <label for="" class="me-3">Original Price: <s> Tk: {{ $product->original_price}}</s></label>
                        <label for="" class="fw-bold"> Selling Price:  Tk: {{ $product->selling_price}}</label>

                        <p class="mt-3">
                            {{$product->description}}
                        </p>
                        <hr>
                        @if ($product->qty >0)
                            <label for="" class="badge bg-success">In Stock</label>
                        @else
                            <label for="" class="badge bg-danger">Out of Stock</label>
                        @endif

                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <span class="input-group-text">-</span>
                                    <input type="text" name="quantity" value="1" class="form-control">
                                    <span class="input-group-text">+</span>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <br>
                                <button class="btn btn-success me-3 float-start">Add To Wishlist</button>
                                <button class="btn btn-primary me-3 float-start">Add To Cart</button>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection