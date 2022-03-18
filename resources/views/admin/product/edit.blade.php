@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Product
        </div>
        <hr>
        <div class="card-body" >
            <form action="{{ url('update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
                <div class="row" >
                    <div class="col-md-12">
                        <label for="Category">Category</label>
                        <select class="form-select" >
                            <option value="">{{ $product->category->name}}</option>
                            
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name='name' value=" {{ $product->name }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name='slug' value="{{ $product->slug }}">
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" class="form-control" rows="3" >{{ $product->small_description }}</textarea>
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="3" >{{ $product->description }}</textarea>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" name='original_price' value="{{ $product->original_price}}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" name='selling_price' value="{{ $product->selling_price}}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" name='tax' value="{{ $product->tax}}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name='qty' value="{{ $product->qty}}">
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox"  name='status'  {{ $product->status=="1"?'checked':'' }}>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="Name">Trending</label>
                        <input type="checkbox"  name='trending'  {{ $product->trending=="1"?'checked':'' }}>
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name='meta_title' value="{{ $product->meta_title }}">
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" class="form-control" rows="3" >{{ $product->meta_keywords }}</textarea>
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3" >{{ $product->meta_description }}</textarea>
                    </div>

                    @if ($product->image)
                        <img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="Image" class= "cate-image">
                    @else
                        
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    
   
@endsection