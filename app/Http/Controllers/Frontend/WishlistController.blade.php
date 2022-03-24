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
        $product_qty = $req->input('product_qty');

        return ($prod_id);
    }
}
