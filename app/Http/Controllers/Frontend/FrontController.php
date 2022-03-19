<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class FrontController extends Controller
{
    public function index(){
        $featured_products = Product::where('trending','1')->take(15)->get();
        $featured_category = Category::where('popular','1')->take(15)->get();
        return view('frontend.index',["featured_products"=>$featured_products,"featured_category"=>$featured_category]);
    }

    public function category(){
        $category = Category::where('status','1')->get();
        return view('frontend.category',["category"=>$category]);
    }

    public function viewCategory($slug){
        if(Category::where('slug',$slug)->exists()){
            $category = Category::where('slug',$slug)->first();
            $product  = Product::where('cate_id',$category->id)->where('status','1')->get();

            return view('frontend.products.index',["category"=>$category,"product"=>$product]);
        }
        else
            return redirect('/')->with('status',"Category does not exist!");

    }


    public function viewProduct($cat_slug, $prod_slug){
        if(Category::where('slug',$cat_slug)->exists()){
            if(Product::where('slug',$prod_slug)->exists()){
                $product = Product::where('slug',$prod_slug)->first();
                return view('frontend.products.viewproduct',["product"=>$product]);
            }
            else 
                return redirect('/')->with('status',"The link was broken!");
        }
        else
            return redirect('/')->with('status',"No such category found!");
        }
}