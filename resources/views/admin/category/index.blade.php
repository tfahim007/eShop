@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Category Page
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="" class="cate-image">
                            </td>
                            <td>
                                <a href="{{url('edit-category',$item->id)}}" class=" mt-6 btn bg-success text-white">Edit</a>
                                <a href="{{url('delete-category',$item->id)}}" class="mt-6 btn bg-danger text-white">Delete</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection