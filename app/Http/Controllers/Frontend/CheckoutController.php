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

class CheckoutController extends Controller
{
    public function index(){
        $cartitems = Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $item){
            if(Product::where('id',$item->prod_id)->where('qty','<',$item->prod_qty)->exists()){
                $remitem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $remitem->delete();
            }
            
            $product = Product::where('id',$item->prod_id)->first();
            $product->qty-= $item->prod_qty;
            $product->update();
        }
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',["collections"=>$cartitems]);
    }

    public function placeOrder(Request $req){
        $order = new Order();
        $order->user_id     = Auth::id();
        $order->fname       = $req->input('fname');
        $order->lname       = $req->input('lname');
        $order->email       = $req->input('email');
        $order->phone       = $req->input('phone');
        $order->address1    = $req->input('address1');
        $order->address2    = $req->input('address2');
        $order->city        = $req->input('city');
        $order->country     = $req->input('country');
        
        //total
        $total = 0;
        $cartitems_total = Cart::where('user_id',Auth::id())->get();
        foreach($cartitems_total as $item){
            $total+= $item->products->selling_price;
        }
        $order->total = $total;
        
        $order->division    = $req->input('division');
        $order->pincode     = $req->input('pincode');
        $order->tracking_no = rand(100000,999999);
        $order->save();

        $cartitems = Cart::where('user_id',Auth::id())->get();

        foreach($cartitems as $item){
                OrderItem::create([
                    'order_id'=>$item->id,
                    'prod_id'=>$item->prod_id,
                    'prod_qty'=>$item->prod_qty,
                    'price'=>$item->products->selling_price,
                ]);
        
        }



        if(Auth::user()->address1 == NULL){
        
        $user = User::where('id',Auth::id())->first();

        $user->lname       = $req->input('lname');
        $user->phone       = $req->input('phone');
        $user->address1    = $req->input('address1');
        $user->address2    = $req->input('address2');
        $user->city        = $req->input('city');
        $user->country     = $req->input('country');
        $user->division    = $req->input('division');
        $user->pincode     = $req->input('pincode');
        $user->update();
        
    }
        Cart::destroy($cartitems);
        return redirect('/')->with('status',"Order Placed Successfully");
    }
}

