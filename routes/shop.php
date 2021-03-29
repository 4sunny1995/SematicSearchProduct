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

Route::get('/', function(){
    return view('shop.index');
});

Route::get('/profile',function(){
    return view('user.profile');
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

    Route::get('getCurrentUser','HomeController@getCurrentUser');
    Route::get('getUserById/{id}','HomeController@getUserById');
});

Route::get('/reward/{id}',"AccountController@reward");

Route::get('/coupon',function(){
    return view('user.coupon');
});
Route::get('/credit/{id}',"AccountController@credit");
