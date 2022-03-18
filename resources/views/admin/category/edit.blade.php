@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Category
        </div>
        <hr>
        <div class="card-body" >
            <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
                <div class="row" >
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name='name' value=" {{ $category->name }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name='slug' value="{{ $category->slug }}">
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="3" >{{ $category->description }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox"  name='status'  {{ $category->status=="1"?'checked':'' }}>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="Name">Popular</label>
                        <input type="checkbox"  name='popular'  {{ $category->popular=="1"?'checked':'' }}>
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name='meta_title' value="{{ $category->meta_title }}">
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" class="form-control" rows="3" >{{ $category->meta_keywords }}</textarea>
                    </div>

                    <div class="col-md-12-mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3" >{{ $category->meta_descrip }}</textarea>
                    </div>

                    @if ($category->image)
                        <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="Image" class= "cate-image">
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