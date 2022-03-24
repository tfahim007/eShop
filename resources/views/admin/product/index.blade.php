@extends('layouts.admin')
@section('content')
    
    <div class="card">
        <div class="card-header">
            Product Page
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-border table-striped">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Category</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Original Price</td>
                        <td>Retail Price</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->original_price }}</td>
                            <td>{{ $item->selling_price }}</td>
                            <td>
                                <img src="{{asset('assets/uploads/product/'.$item->image)}}" alt="" class="cate-image-product">
                            </td>
                            <td>
                                <a href="{{url('edit-product',$item->id)}}" class=" mt-3
                                     btn bg-success btn-sm text-white">Edit</a>
                                <a href="{{url('delete-product',$item->id)}}" class=" mt-3 btn bg-danger btn-sm text-white">Delete</a>

                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection