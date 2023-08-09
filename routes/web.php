<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/products', function () {
//     return view('products');
// });

Route::get('/product_details', function () {
    return view('product_details');
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::resource('/products', ProductController::class);

Route::resource('/users', UserController::class);

Route::get('/admin_products','\App\Http\Controllers\ProductController@addproduct');

Route::get('/','\App\Http\Controllers\ProductController@home');
