@extends('layouts.front')
@section('title')
    Welcome to E-Shop
@endsection

@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
                <h2>Featured Products</h2>
                <hr>
                <div class="row">
                    <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($featured_products as $item)
                            <div class="item">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/product/'.$item->image) }}" class = "cate-image" alt="Product Image">
                                    <div class="card-body">
                                        <h5>{{ $item->name}}</h5>
                                        <span class="float-start" style="color:red"> <b>Tk.{{ $item->original_price}}</b> </span>
                                        <span class="float-end"> <s><b>Tk.{{ $item->selling_price}}</b></s> </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach ($featured_products as $item)
                    </div>
                </div>
            
        </div>
    </div> 

    <div class="py-5">
        <div class="container">
                <h2>Trending Categories</h2>
                <hr>
                <div class="row">
                    <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($featured_category as $item)
                            <div class="item"> 
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'.$item->image) }}" class = "cate-image" alt="Category Image">
                                    <div class="card-body">
                                        <h5>{{ $item->name}}</h5>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach ($featured_cateogory as $item)
                    </div>
                </div>
            
        </div>
    </div> 
@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
    
@endsection