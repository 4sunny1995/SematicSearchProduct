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
    Route::get('getCurrentUser','HomeController@getCurrentUser');
    Route::get('getUserById/{id}','HomeController@getUserById');
    Route::get('getByCategory/{id}','HomeController@getByCategory');
    Route::get('getByCategoryId','HomeController@getByCategoryId');
    Route::get('getLocale', 'HomeController@getLocale');
});

Route::get('/reward/{id}',"AccountController@reward");

Route::get('/coupon',function(){
    return view('user.coupon');
});
Route::get('/credit/{id}',"AccountController@credit");
