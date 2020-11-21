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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard','UserController@dashboard')->name('dashboard');
    Route::get('checkout','ProductController@checkout')->name('checkout');
    Route::get('/payment/verify_transaction','ProductController@verify')->name('payment.verify');
    Route::get('/send-email','UserController@sendMail')->name('send.mail');
    Route::post('/download-puchased','UserController@downloadPuchased')->name('download.p');
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');


Route::post('/add-check', 'ProductController@check')->name('check');


Route::get('/connect', 'HomeController@connect')->name('connect');


Route::get('/b/{slug}', 'ProductController@show')->name('p.details');


Route::get('dashboard/{any}','UserController@dashboard')->where('any','.*');
