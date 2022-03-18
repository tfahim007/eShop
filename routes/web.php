<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Frontend\FrontController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Frontend
Route::get('/',[FrontController::class,'index']);

// Admin
Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('dashboard',[FrontendController::class,'index']);

    // Categories
    Route::get('categories',[CategoryController::class,'index']);
    Route::get('add-category',[CategoryController::class,'add']);
    Route::post('insert-category',[CategoryController::class,'insertCategory']);
    Route::get('edit-category/{id}',[CategoryController::class,'edit']);
    Route::put('update-category/{id}',[CategoryController::class,'update']);
    Route::get('delete-category/{id}',[CategoryController::class,'destroy']);
    
    // Products
    Route::get('products',[ProductController::class,'index']);
    Route::get('add-product',[ProductController::class,'add']);
    Route::post('insert-product',[ProductController::class,'insertProduct']);
    Route::get('edit-product/{id}',[ProductController::class,'edit']);
    Route::put('update-product/{id}',[ProductController::class,'update']);
    Route::get('delete-product/{id}',[ProductController::class,'destroy']);


 });