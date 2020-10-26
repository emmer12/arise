<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::group(['middleware' => ['auth']], function () {
Route::post('create-product','ProductController@create');
Route::post('/create-blog','BlogController@store');
Route::delete('/delete-all/{id}','BlogController@destroy');

});



Route::patch('/edit-blog/{id}','BlogController@update');




Route::get('/get-all','BlogController@getall');

Route::get('/token',function(){
    return csrf_token(); 
});

