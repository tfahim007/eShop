<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('status',0)->get();
        return view('admin.order.index',["orders"=>$orders]);
    }

    public function viewOrder($id){
        $orders = Order::where('id',$id)->first();
        return view('admin.order.view',["orders"=>$orders]);
    }
}
