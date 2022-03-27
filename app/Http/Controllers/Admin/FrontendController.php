<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;


class FrontendController extends Controller
{
    public function index(){
        $user = User::all()->count();
        $category = Category::all()->count();
        $product = Product::all()->count();
        $new_orders = Order::where('status','0')->count();
        $completed_orders = Order::where('status','1')->count();
        return view('admin.index',["user"=>$user, "category"=>$category, "product"=>$product,"new_orders"=>$new_orders,"completed_orders"=>$completed_orders]);
    }

    public function users(){
        $users = User::all();
        return view('admin.user.index',["users"=>$users]);
    }

    public function viewUser($id){
        $users = User::find($id);
        return view('admin.user.view',["users"=>$users]);  
    }

}
