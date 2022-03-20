@extends('layouts.front')
@section('title')
    {{$product->name}}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('category')}}"> Collections</a> /
                <a href="{{url('view-category/'.$product->category->slug)}}">{{$product->category->name}}</a>/
                <a href="{{url('category/'.$product->category->slug.'/'.$product->slug)}}">{{$product->name}}</a>

            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded product_data">
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
                        <br><br>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $product->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name ="quantity" class="qty-input form-control text-center" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <br>
                                <button class="btn btn-success me-3 float-start">Add To Wishlist <i class="fa fa-heart"></i></button>
                                <button class="btn btn-primary me-3 float-start addToCartBtn">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


