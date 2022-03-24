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

    public function updateOrder(Request $req, $id){
        $order = Order::find($id);
        $order->status = $req->input('order-status');
        $order->update();

        return redirect('orders')->with('status','Order Payment Status Updated Successfully');
    }

    public function orderHistory(){
        $orders = Order::where('status',1)->get();
        return view('admin.order.history',["orders"=>$orders]);
    }
}
