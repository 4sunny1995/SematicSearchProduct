<?php

use App\Model\Product;
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

Route::get('/', function(){
    return view('shop.index');
});

Route::get('/profile',function(){
    return view('user.profile');
});
Route::get('category/{id}',function(){
    // for($i =45;$i<=99;$i++){
    //     $p=Product::findOrfail($i);
    //     $p->category_id = 3;
    //     $p->save();
    // }
    // Product::all()->each(function($p){
    //     $p->category_id=1;
    //     $p->save();
    // });
    return view('shop.products');
});
Route::get('product/{id}', function () {
    return view('shop.productdetail');
});
Route::get('/myCart',"MyCartController@index");
Route::get('/myWishlist',"MyWishListController@index");
Route::get('checkout',function(){
    return view('shop.checkout');
});
Route::prefix('api')->group(function () {
    Route::resource('categoryParents', 'resources\CategoryParentController');
    Route::resource('posts', 'resources\PostController');
    Route::resource('likes', 'resources\LikeController');
    Route::resource('comments', "resources\CommentController");
    Route::resource('users', 'resources\UserController');
    Route::resource('coupons', 'resources\CouponController');
    Route::resource('coupon-histories', 'resources\CouponHistoryController');
    Route::resource('rewards', 'resources\RewardController');
    Route::resource('reward-histories', 'resources\RewardHistoryController');
    Route::resource('credits', 'resources\CreditController');
    Route::resource('credit-histories', 'resources\CreditHistoryController');
    Route::resource('categories', 'resources\CategoryController');
    Route::resource('products', 'resources\ProductController');
    Route::resource('carts', 'resources\CartController');
    Route::resource('wishlists', 'resources\WishListController');
    Route::get('getCurrentUser','HomeController@getCurrentUser');
    Route::get('getUserById/{id}','HomeController@getUserById');
    Route::get('getByCategory/{id}','HomeController@getByCategory');
    Route::get('getByCategoryId','HomeController@getByCategoryId');
    Route::get('getLocale', 'HomeController@getLocale');
    Route::get('mycart','MyCartController@getMyCart');
    Route::post('mycart','MyCartController@changeAmountOfItem');
    Route::get('mywishlist','MyWishListController@getMyWishList');
    Route::post('mywishlist','MyCartController@changeAmountOfItem');
    Route::get('customer/orderCheckout','Client\CheckoutController@index');
    Route::post('payment/{type}','PaymentController@Payment');
    Route::get('myorder',"MyOrderController@getMyOrder");
    Route::get('myorderdetail/{id}',"MyOrderController@getMyOrderDetail");

});

Route::get('/reward/{id}',"AccountController@reward");

Route::get('/coupon',function(){
    return view('user.coupon');
});
Route::get('/credit/{id}',"AccountController@credit");
Route::get('checkout-result',function(){
    return view('shop.checkout-result');
});
Route::get('myOrder',function(){
    return view('shop.myorder');
});
Route::get('orderdetail/{id}',function(){
    return view('shop.orderdetail');
});
