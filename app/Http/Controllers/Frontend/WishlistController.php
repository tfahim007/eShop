<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index(){
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',["wishlists"=>$wishlist]);
    }

    public function addProduct(Request $req){
        
        $product_id = $req->input('product_id');

        if(Auth::check()){

            $prod_check = Product::where('id',$product_id)->first();
            if($prod_check){

                if(Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                    return response()->json(['status'=>$prod_check->name." Already Added to Wishlist!"]);

                else{
                    $cartItem = new Wishlist();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->save();
                return response()->json(['status'=>$prod_check->name." Added to Wishlist"]);
                }

            }
            else 
                return response()->json(['status'=>"Product Not Found!"]);
        }
        else{

            return response()->json(['status'=>"Login To Continue"]); 
        }
    }

    public function deleteProduct(Request $req){
        if(Auth::check()){

            $prod_id = $req->input('prod_id');
            if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cartitem = Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartitem->delete();

                return response()->json(['status'=>"Item Removed From Wishlist Successfully"]);
            }
           

        }
        else{

            return response()->json(['status'=>"Login To Continue"]); 
        }

    }

    public function wishlistCount(){
        $wishlist = Wishlist::where('user_id',Auth::id())->count();
        return response()->json(["count"=>$wishlist]);

    }
}
