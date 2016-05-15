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
		// Account settings routes
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

		Route::get('account/deactivated', [
			'uses' => 'Account\AccountController@deactivated',
			'as' => 'deactivated'
		]);
	});

	Route::group(['prefix' => 'account/email', 'as' => 'account.email.'], function() {
		// Edit email address routes
		Route::get('edit', [
			'uses' => 'Account\EmailController@edit',
			'as' => 'edit'
		]);

		Route::post('edit', [
			'uses' => 'Account\EmailController@update'
		]);
	});

	Route::group(['prefix' => 'account/password', 'as' => 'account.password.'], function() {
		// Edit password routes
		Route::get('edit', [
			'uses' => 'Account\PasswordController@edit',
			'as' => 'edit'
		]);

		Route::post('edit', [
			'uses' => 'Account\PasswordController@update'
		]);
	});

	// Password reset routes
	Route::group(['prefix' => 'account/password', 'as' => 'account.password.'], function() {
		// Password reset link request routes
		Route::get('email', [
			'uses' => 'Auth\PasswordController@getEmail',
			'as' => 'email'
		]);

		Route::post('email', [
			'uses' => 'Auth\PasswordController@postEmail'
		]);

		// Password reset routes
		Route::get('reset/{token}', [
			'uses' => 'Auth\PasswordController@getReset'
		]);

		Route::post('reset', [
			'uses' => 'Auth\PasswordController@postReset'
		]);
	});

	Route::group(['middleware' => ['role:admin']], function() {
		// User management routes
		Route::patch('user/{user}/activate', [
			'uses' => 'UserController@activate',
			'as' => 'user.activate'
		]);
		Route::resource('user', 'UserController');
		
		// Retailer management
		Route::resource('retailer', 'RetailerController');
	});

	// Product routes
	Route::resource('product', 'ProductController');

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
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'logout'
]);

// Registration routes...
Route::get('register', [
    'uses' => 'Auth\AuthController@getRegister',
	'as' => 'register'
]);

Route::post('register', [
    'uses' => 'Auth\AuthController@postRegister'
]);
