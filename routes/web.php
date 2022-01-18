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

Route::get('load-cart-data','Frontend\CartController@cartCount');
Route::get('load-wishlist-data','Frontend\WishListController@wishListCount');


Route::post('add-to-cart','Frontend\CartController@addProduct');
Route::post('delete-cart-item','Frontend\CartController@deleteProduct');
Route::post('update-cart','Frontend\CartController@updateCart');

Route::post('add-to-wishList','Frontend\WishListController@add');
Route::post('delete-wishlist-item','Frontend\WishListController@deleteItem');
Route::middleware(['auth'])->group(function (){
    Route::get('cart','Frontend\CartController@viewCart');
    Route::get('checkout','Frontend\CheckoutController@index');
    Route::post('place-order','Frontend\CheckoutController@placeOrder');
    Route::get('my-orders','Frontend\UserController@index');
    Route::get('view-order/{id}','Frontend\UserController@view');

    Route::post('add-rating','Frontend\RatingController@add');
    Route::get('add-review/{product_slug}/user-review','Frontend\ReviewController@add');

    Route::post('add-review','Frontend\ReviewController@create');
    Route::get('edit-review/{product_slug}/user-review','Frontend\ReviewController@edit');
    Route::put('update-review','Frontend\ReviewController@update');

    Route::get('wishList','Frontend\WishListController@viewWishList');
    Route::post('proceed-to-pay','Frontend\CheckoutController@razorPayCheck');
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


    Route::get('orders','Admin\OrderController@index');
    Route::get('admin/view-order/{id}','Admin\OrderController@view');
    Route::put('update-order/{id}','Admin\OrderController@updateOrder');
    Route::get('order-history','Admin\OrderController@orderHistory');

    Route::get('users','Admin\DashboardController@users');
    Route::get('view-user/{id}','Admin\DashboardController@viewUser');
});


