<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('admin.product.index',["product"=>$product]);
    }

    public function add(){
        $category = Category::all();
        return view('admin.product.add',["category"=>$category]);
    }

    public function insertProduct(Request $req){
        $product = new Product();

        if($req->hasFile('image')){
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image = $filename;
        }
        else{
            $product->image = 'default.png';
        }

        $product->cate_id= $req->input('cate_id');
        $product->name = $req->input('name');
        $product->slug = $req->input('slug');
        $product->small_description = $req->input('small_description');
        $product->description = $req->input('description');

        $product->original_price = $req->input('original_price');
        $product->selling_price = $req->input('selling_price');
        $product->tax = $req->input('tax');
        $product->qty = $req->input('qty');

        $product->status = $req->input('status')==TRUE ? '1':'0';
        $product->trending = $req->input('trending')==TRUE ? '1':'0';

        $product->meta_title = $req->input('meta_title');
        $product->meta_keywords = $req->input('meta_keywords');
        $product->meta_description = $req->input('meta_description');
        
        $product->save();
        return redirect('products')->with('status',"Product Added Successfully");
    }   

    public function edit($id){
        $product = Product::find($id);
        return view('admin.product.edit',["product"=>$product]);
    }
    
    public function update(Request $req, $id){
        $product = product::find($id);
        if($req->hasFile('image')){
            $path = 'assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image = $filename;
        }

        $product->name = $req->input('name');
        $product->slug = $req->input('slug');
        $product->small_description = $req->input('description');
        $product->description = $req->input('small_description');

        $product->original_price = $req->input('original_price');
        $product->selling_price = $req->input('selling_price');
        $product->tax = $req->input('tax');
        $product->qty = $req->input('qty');

        $product->status = $req->input('status')==TRUE ? '1':'0';
        $product->trending = $req->input('trending')==TRUE ? '1':'0';
        $product->meta_title = $req->input('meta_title');
        $product->meta_keywords = $req->input('meta_keywords');
        $product->meta_description = $req->input('meta_description');
        $product->update();

        return redirect('products')->with('status','Product Updated Successfully');
    }

    public function destroy($id){
        $product = Product::find($id);
        if($product->image){
            $path = 'assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('products')->with('status','Product Deleted Successfully');
    }
}
