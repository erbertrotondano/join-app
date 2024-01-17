<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->namespace('App\Http\Controllers\Api')->group(function() {
    
    Route::name('product_categories.')->group(function(){
        Route::resource('product-categories', 'ProductCategoryController');
    });
    Route::name('products.')->group(function(){
        Route::resource('products', 'ProductController');
        Route::get('product-category/{category_id}/products', 'ProductController@productsByCategory')->name('productsByCategory');
    });
    
});
