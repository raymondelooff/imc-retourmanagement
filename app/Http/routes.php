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
Route::group(['middleware' => ['auth']], function() {

	Route::get('/', [
		'uses' => 'IndexController@getIndex',
		'as' => 'index'
	]);

	Route::group(['as' => 'account::'], function() {
		Route::get('account', [
			'uses' => 'Account\AccountController@getIndex',
			'as' => 'index'
		]);

		Route::get('account/wijzigen', [
			'uses' => 'Account\AccountController@getEdit',
			'as' => 'edit'
		]);

		Route::post('account/wijzigen', [
			'uses' => 'Account\AccountController@postEdit'
		]);
	});

});

// Authentication routes...
Route::get('inloggen',  [
    'uses' => 'Auth\AuthController@getLogin',
    'as' => 'logout'
]);

Route::post('inloggen', [
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::get('uitloggen', [
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'login'
]);

// Registration routes...
Route::get('registreren', [
    'uses' => 'Auth\AuthController@getRegister'
]);

Route::post('registreren', [
    'uses' => 'Auth\AuthController@postRegister'
]);