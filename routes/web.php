<?php

use Illuminate\Support\Facades\Route;


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
//
//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/','Frontend\FrontendController@index');
Route::get('category','Frontend\FrontendController@category');
Route::get('category/{slug}','Frontend\FrontendController@viewCategory');
Route::get('category/{cate_slug}/{pro_slug}','Frontend\FrontendController@viewProduct');
\Illuminate\Support\Facades\Auth::routes();

Route::post('add-to-cart','Frontend\CartController@addProduct');
Route::post('delete-cart-item','Frontend\CartController@deleteProduct');
Route::post('update-cart','Frontend\CartController@updateCart');
Route::middleware(['auth'])->group(function (){
    Route::get('cart','Frontend\CartController@viewCart');
    Route::get('checkout','Frontend\CheckoutController@index');
});



Route::get('/', 'Frontend\FrontendController@index')->name('home');
Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('/dashboard','Admin\FrontendController@index');

    Route::get('categories','Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-category/{id}','Admin\CategoryController@edit');
    Route::put('update-category/{id}','Admin\CategoryController@update');
    Route::get('delete-category/{id}','Admin\CategoryController@destroy');

    Route::get('products','Admin\ProductController@index');
    Route::get('add-product','Admin\ProductController@add');
    Route::post('insert-product','Admin\ProductController@insert');
    Route::get('edit-product/{id}','Admin\ProductController@edit');
    Route::put('update-product/{id}','Admin\ProductController@update');
    Route::get('delete-product/{id}','Admin\ProductController@destroy');
});


