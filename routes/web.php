<?php

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



//User Login
Route::any('/login','UserController@login')->name('login');
Route::any('/admin/login','AdminController@login')->name('login');
Route::any('/signup','UserController@signUp');
Route::any('/buyer-signup','UserController@BuyerSignUp');
Route::any('/seller-signup','UserController@SellerSignUp');
Route::any('/logout','UserController@logout');
Route::any('/token/{token}','UserController@VerifyEmail');
Route::get('/', function () {
    return view('welcome');
});

Route::group([ 'middleware' => ['auth','role:admin|buyer']], function() {
    Route::get('/admin','AdminController@index');
    Route::any('/create-rfq','BuyerController@CreateRfq');
});
