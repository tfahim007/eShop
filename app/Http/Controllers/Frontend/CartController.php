<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function addProduct(Request $req){
        
        $product_id = $req->input('product_id');
        $product_qty = $req->input('product_qty');

        if($product_qty == NULL) $product_qty=1;
        
        if(Auth::check()){

            $prod_check = Product::where('id',$product_id)->first();
            if($prod_check){

                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                    return response()->json(['status'=>$prod_check->name." Already Added to cart"]);
                else{
                    $cartItem = new Cart();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $product_qty;
                $cartItem->save();
                return response()->json(['status'=>$prod_check->name." Added to cart"]);
                }

            }
        }
        else{

            return response()->json(['status'=>"Login To Continue"]); 
        }
    }

    public function viewCart(){
        $cart_items = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',["cartitems"=>$cart_items]);
    }

    public function deleteProduct(Request $req){
        if(Auth::check()){

            $prod_id = $req->input('prod_id');
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cartitem = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartitem->delete();

                return response()->json(['status'=>"Item Removed Successfully"]);
            }

        }
        else{

            return response()->json(['status'=>"Login To Continue"]); 
        }

    }

    public function updateCart(Request $req){
        if(Auth::check()){

            $prod_id = $req->input('prod_id');
            $prod_qty = $req->input('prod_qty');
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cartitem = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartitem->prod_qty = $prod_qty;
                $cartitem->update();

                return response()->json(['status'=>"Quantity updated Successfully"]);
            }

        }
        else{

            return response()->json(['status'=>"Login To Continue"]); 
        }

    }
}
