@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Add Product
        </div>
        <hr>
        <div class="card-body" >
            <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
               @csrf
                <div class="row" >
                    <div class="col-md-12">
                        <select class="form-select" name="cate_id" aria-label="Default select example">
                            <option value="">Select a Category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id}}"> {{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br><br>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name='name'>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name='slug'>
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" name='original_price'>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" name='selling_price'>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" name='tax'>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name='qty'>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox"  name='status' >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="Name">Trending</label>
                        <input type="checkbox"  name='trending' >
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name='meta_title'>
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-12 ">
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    
   
@endsection