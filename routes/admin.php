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
    return redirect('admin/login');
});
Route::get('/login', function(){
    return view('admin.login');
});
Route::get('/register', function(){
    return view('admin.register');
});
Route::post('/login',"Admin\LoginController@checkLogin");
Route::post('/register', 'Admin\UserController@store');
Route::get('/dashboard',function(){
    return view('admin.dashboard');
});
Route::get('/broaders',function(){
    return view('admin.broader');
});
Route::get('narrowers',function(){
    return view('admin.narrower');
});
Route::get('histories',function(){
    return view('admin.history');
});
Route::get('word', function(){
    return view('admin.word');
});
Route::get('email',function(){
    return view('admin.email');
});
Route::get('sms',function(){
    return view('admin.sms');
});
Route::get('posts', function(){
    return view('admin.posts');
});
Route::get('comments',function(){
    return view('admin.comment');
});
Route::get('coupon',function(){
    return view('admin.coupon');
});
Route::get('coupon-history',function(){
    return view('admin.coupon-history');
});
Route::get('reward',function(){
    return view('admin.reward');
});
Route::get('reward-history',function(){
    return view('admin.reward-history');
});
Route::get('credit',function(){
    return view('admin.credit');
});
Route::get('credit-history',function(){
    return view('admin.credit-history');
});
Route::get('products',function(){
    return view('admin.product');
});
Route::get('spider-histories',function(){
    return view('admin.crawler-histories');
});
Route::resource("spiders","Admin\SpiderController");

Route::group(['prefix' => 'api'], function () {
    Route::resource('broaders','Admin\BroaderController');
    Route::resource('narrowers', 'Admin\NarrowerController');
    Route::resource('histories', 'Admin\HistoryController');
    Route::resource('posts', 'Admin\PostController');
    Route::resource('crawler-histories', 'Admin\CrawlerHistoryController');
    Route::resource('products', 'Admin\ProductController');
    Route::get('getBroader','Admin\DashboardController@getBroader');
    Route::get('getNarrower','Admin\DashboardController@getNarrower');
    Route::get('getHistory','Admin\DashboardController@getHistory');
    Route::post('sendEmail',"Admin\EmailController@sendEmail");
    // Route::get('crawler-histories/reSpider',function(){
    //     return 1;
    // });
    Route::post('crawler-histories/reSpider',"Admin\SpiderController@reSpiderItem");
});
Route::get("logout","Auth\LoginController@logout")->name('admin.logout');
Route::resource('orders',"Admin\OrderController");
Route::get('/orders/delete/{id}','Admin\OrderController@destroy');