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

	Route::group(['as' => 'account.'], function() {
		Route::get('account', [
			'uses' => 'Account\AccountController@index',
			'as' => 'index'
		]);

		Route::get('account/edit', [
			'uses' => 'Account\AccountController@edit',
			'as' => 'edit'
		]);

		Route::post('account/edit', [
			'uses' => 'Account\AccountController@update'
		]);
	});

	Route::group(['as' => 'account.email.'], function() {

		Route::get('account/email/edit', [
			'uses' => 'Account\EmailController@edit',
			'as' => 'edit'
		]);

		Route::post('account/email/edit', [
			'uses' => 'Account\EmailController@update'
		]);

	});

	Route::group(['as' => 'account.password.'], function() {

		Route::get('account/password/edit', [
			'uses' => 'Account\PasswordController@edit',
			'as' => 'edit'
		]);

		Route::post('account/password/edit', [
			'uses' => 'Account\PasswordController@update'
		]);

	});

});

// Authentication routes...
Route::get('login',  [
    'uses' => 'Auth\AuthController@getLogin',
    'as' => 'login'
]);

Route::post('login', [
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::get('logout', [
    'uses' => 'Auth\AuthController@logout',
    'as' => 'logout'
]);

// Registration routes...
Route::get('register', [
    'uses' => 'Auth\AuthController@getRegister'
]);

Route::post('register', [
    'uses' => 'Auth\AuthController@postRegister'
]);