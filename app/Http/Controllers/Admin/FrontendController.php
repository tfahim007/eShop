<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        return view('admin.index');
    }

    function users(){
        
    }
}
