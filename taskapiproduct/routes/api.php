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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['prefix'=>'categories'],function(){
	Route::get('/','CategoryController@getAll');
	Route::post('/store','CategoryController@store');
});

Route::group(['prefix' => 'category'],function (){
	Route::get('/{categoryid}','CategoryController@getbyId');
	Route::delete('/{categoryid}','CategoryController@destroy');
	Route::put('/{categoryid}','CategoryController@update');
});

Route::group(['prefix'=>'products'],function(){
	Route::post('/store','ProductController@store');
	Route::get('/','ProductController@getAll');
	Route::get('/{productid}','ProductController@getbyId');
	Route::get('/cat/{categoryid}','ProductController@getProductsByCategoryId');
	Route::put('/{productid}','ProductController@update');
	Route::delete('/{productid}','ProductController@destroy');
});