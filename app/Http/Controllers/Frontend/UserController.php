<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class UserController extends Controller
{
    public function index(){

        $order = Order::where('user_id',Auth::id())->get();
        return view('frontend.order.index',["orders"=>$order]);

    }

    public function viewOrder($id){
        $order = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('frontend.order.view',["orders"=>$order]);
    }

}
