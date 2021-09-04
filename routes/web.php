<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Middleware\userAuth;
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

Route::middleware(['userAuth'])->group(function () {
    Route::view('addProduct', 'addProduct');
    Route::post('addproductcontroller',[ProductsController::class,'store']);
    Route::get('product-detail/{id}',[ProductsController::class,'detail']);
    Route::post('addtocart/{id}',[ProductsController::class,'cart']);
    Route::get('cartremove/{id}',[ProductsController::class,'cartremove']);
    Route::get('cart',[ProductsController::class,'cartshow']);
    Route::get('order',[ProductsController::class,'order']);
    Route::post('orderplace',[ProductsController::class,'orderPlace']);
    Route::get('myorders',[ProductsController::class,'myorder']);
});

Route::post('logincontroller',[UserController::class,'loginverify']);
Route::get('logout',[UserController::class,'logout']);
Route::post('registerController',[UserController::class,'register']);


Route::get('/',[ProductsController::class,'show']);
Route::view('/login','login');