<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// Protected group
Route::group(['middleware' => ['auth']], function () {

	Route::get('/', [
		'uses' => 'IndexController@getIndex',
		'as' => 'index'
	]);

});

// Authentication routes...
Route::get('inloggen',  [
    'uses' => 'Auth\AuthController@getLogin',
    'as' => 'inloggen'
]);

Route::post('inloggen', [
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::get('uitloggen', [
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'uitloggen'
]);

// Registration routes...
Route::get('registreren', [
    'uses' => 'Auth\AuthController@getRegister'
]);

Route::post('registreren', [
    'uses' => 'Auth\AuthController@postRegister'
]);