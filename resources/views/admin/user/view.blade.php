@extends('layouts.admin');
@section('title')
    Order Details
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3>User Details
                        <a href="{{url('users')}}"><button class="btn btn-primary-outline float-end">Back</button></a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="">Role</label>
                            <div class="border p-2">{{ $users->role_as=='0'?'User':'Admin'}} </div><br>
                        </div> 
                        <div class="col-md-4 mt-3">
                            <label for="">First Name</label>
                            <div class="border p-2">{{ $users->name}} </div><br>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Last Name</label>
                            <div class="border p-2">{{ $users->lname}} </div><br>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Email</label>
                            <div class="border p-2">{{ $users->email}} </div><br>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Phone</label>
                            <div class="border p-2">{{ $users->phone}} </div><br>
                        </div> 
                        <div class="col-md-4 mt-3">
                            <label for="">Address</label>
                            <div class="border p-2">{{ $users->address1}}, {{ $users->address2}}  </div><br>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">City</label>
                            <div class="border p-2">{{ $users->city}} </div><br>
                        </div> 

                        <div class="col-md-4 mt-3">
                            <label for="">Division</label>
                            <div class="border p-2">{{ $users->division}} </div><br>
                        </div> 
                        <div class="col-md-4 mt-3">
                            <label for="">Country</label>
                            <div class="border p-2">{{ $users->country}} </div><br>
                        </div> 

                        <div class="col-md-4 mt-3">
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{ $users->pincode}} </div><br>
                        </div> 
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection

