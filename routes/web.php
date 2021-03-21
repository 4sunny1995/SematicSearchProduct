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

Route::get('/', function () {
    return view('search');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();
Route::get('/login',function(){
    return view('shop.login');
})->name('login');


Route::get('/search', 'SearchController@index');
Route::get('search-learning','LearningController@tagLearning');
Route::get('search/product/{id}','SearchController@getProductByTag');

Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::post('/uploadFile','UploadController@upload');