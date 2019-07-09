<?php

use Illuminate\Http\Request;

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

Route::group(['prefix'=>'order'],function(){
	Route::get('/getAll','OrderController@show');
	Route::get('/getAll/{order}','OrderController@getById');
	Route::post('/store','OrderController@store');
	Route::post('/{order}/pay','OrderController@pay');
	Route::put('/{order}/cancel','OrderController@destroy');
	Route::put('/{order}','OrderController@update');
});




