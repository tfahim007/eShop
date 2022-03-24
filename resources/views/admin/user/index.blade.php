@extends('layouts.admin')
@section('title')
    Registered Users
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-gradient-light">
                        <h3>
                            Registered Users
                            {{-- <a href="{{url('order-history')}}" class="btn btn-success float-end"> History</a> --}}

                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{($item->id) }}</td>
                                            <td>{{ $item->name}}</td>
                                            <td>{{ $item->email}}</td>
                                            <td>{{ $item->phone}}</td>
                                            <td class="text-center">
                                                <a href=" {{url('view-users/'.$item->id)}}"><button class="btn btn-primary "> View </button></a>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection