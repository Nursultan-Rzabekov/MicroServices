<?php



use Illuminate\Http\Request;


Route::group([
	'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::get('/get/{user}','UserController@get');
Route::post('/create','UserController@create')->middleware('auth:api');
Route::put('/update/{user}','UserController@update')->middleware('auth:api');
Route::delete('/delete/{user}','UserController@destroy')->middleware('auth:api');
Route::get('/get','UserController@getAll');


