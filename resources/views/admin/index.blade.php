@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-gradient-light">
               <h2>Overview</h2>
            </div>
        
            <div class="row">
                <div class="col-md-4 mt-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 >Total Users</h3>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center">{{ $user }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3>Total Categories</h3>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center">{{ $category }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3>Total Products</h3>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center">{{ $product }}</h4>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-4 mt-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3>NEw Orders</h3>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center">{{ $new_orders }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3>Completed Orders</h3>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center">{{ $completed_orders }}</h4>
                        </div>
                    </div>
                </div>
               
                
            </div>
        </div>
    </div>

@endsection