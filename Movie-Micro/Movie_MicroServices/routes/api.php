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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix'=>'categories'],function(){
	Route::get('/','CategoryController@getAll');
	Route::post('/store','CategoryController@store');
});
Route::group(['prefix' => 'category'],function (){
	Route::get('/{category}','CategoryController@show');
	Route::delete('/{category}','CategoryController@destroy');
	Route::put('/{category}','CategoryController@update');
});


Route::group(['prefix'=>'films'],function(){
	Route::get('/','FilmController@index');
	Route::post('/store','FilmController@store');
	
});
Route::group(['prefix' => 'film'],function (){
	Route::get('/{film}','FilmController@show');
	Route::get('/cat/{category}','FilmController@getFilmsByCategoryId');
	Route::put('/{film}','FilmController@update');
	Route::delete('/{film}','FilmController@destroy');
});


Route::group(['prefix'=>'languages'],function(){
	Route::get('/','LanguageController@index');
	Route::post('/store','LanguageController@store');
});
Route::group(['prefix' => 'language'],function (){
	Route::get('/{language}','LanguageController@show');
	Route::delete('/{language}','LanguageController@destroy');
	Route::put('/{language}','LanguageController@update');
});


Route::group(['prefix'=>'actors'],function(){
	Route::get('/','ActorController@index');
	Route::post('/store','ActorController@store');
});
Route::group(['prefix' => 'actor'],function (){
	Route::get('/{actor}','ActorController@show');
	Route::get('/id/{actor}','ActorController@showByIdgetFilms');
	Route::delete('/{actor}','ActorController@destroy');
	Route::put('/{actor}','ActorController@update');
});
