<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class FrontendController extends Controller
{
    public function index(){
        return view('admin.index');
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
