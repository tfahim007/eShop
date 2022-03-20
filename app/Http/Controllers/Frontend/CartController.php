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

        if(Auth::check()){

            $prod_check = Product::where('id',$product_id)->first();
            if($prod_check){

                if(cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
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
}
