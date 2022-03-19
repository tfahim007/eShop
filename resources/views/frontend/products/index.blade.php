@extends('layouts.front')
@section('title')
    Products
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            Collections/{{ $category->name }}
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
            <h2>{{ $category->name }}</h2>
            <hr>
            <div class="row">
                    @foreach ($product as $item)
                        <div class="col-md-3">
                            <a href="{{url('category/'.$category->slug.'/'.$item->slug)}}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/product/'.$item->image) }}" class = "cate-image" alt="Product Image">
                                    <div class="card-body">
                                        <h5>{{ $item->name}}</h5>
                                        <span class="float-start" style="color:red"> <b>Tk.{{ $item->original_price}}</b> </span>
                                        <span class="float-end"> <s><b>Tk.{{ $item->selling_price}}</b></s> </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach ($featured_products as $item)
                
            </div>
        
    </div>
</div> 
@endsection