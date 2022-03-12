<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function add(){
        return view('admin.category.add');
    }

    public function insertCategory(Request $req){
        $category = new Category();

        if($req->hasFile('image')){
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
        }

        $category->name = $req->input('name');
        $category->slug = $req->input('slug');
        $category->description = $req->input('description');
        $category->status = $req->input('status')==TRUE ? '1':'0';
        $category->popular = $req->input('popular')==TRUE ? '1':'0';
        $category->meta_title = $req->input('meta_title');
        $category->meta_keywords = $req->input('meta_keywords');
        $category->meta_descrip = $req->input('meta_description');
        
        $category->save();
        return redirect('dashboard')->with('status',"Category Added Successfully");
    }   


}
