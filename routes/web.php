<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;


use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
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
//  return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Frontend
Route::get('/',[FrontController::class,'index']);
Route::get('category',[FrontController::class,'category']);
Route::get('view-category/{slug}',[FrontController::class,'viewCategory']);
Route::get('category/{slug}/{prodslug}',[FrontController::class,'viewProduct']);
Route::post('add-to-cart',[CartController::class,'addProduct']);
Route::post('delete-cart-item',[CartController::class,'deleteProduct']);
Route::post('update-cart',[CartController::class,'updateCart']);

Route::post('add-to-wishlist',[WishlistController::class,'addProduct']);
Route::post('delete-wishlist-item',[WishlistController::class,'deleteProduct']);


// Cart
Route::middleware(['auth'])->group(function (){
    Route::get('cart',[CartController::class,'viewCart']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place-order',[CheckoutController::class,'placeOrder']);
    Route::get('my-orders',[UserController::class,'index']);
    Route::get('view-order/{id}',[UserController::class,'viewOrder']);
   
    Route::get('wishlist',[WishlistController::class,'index']);

});



// Admin
Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('dashboard',[FrontendController::class,'index']);
    Route::get('users',[FrontendController::class,'users']);
    Route::get('view-users/{id}',[FrontendController::class,'viewUser']);

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

    //ORDERS
    Route::get('orders',[OrderController::class,'index']);
    Route::get('admin/view-order/{id}',[OrderController::class,'viewOrder']);
    Route::get('update-order/{id}',[OrderController::class,'updateOrder']);
    Route::get('order-history',[OrderController::class,'orderHistory']);

    //WISHLIST

 });