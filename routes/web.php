<?php

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

Route::group(['middleware' => 'guest'], function () {
	Route::get('/', 'Auth\CustomLoginController@showLoginPage')->name('get:login');
	Route::get('login', 'Auth\CustomLoginController@showLoginPage')->name('get:login');
	Route::post('/', 'Auth\CustomLoginController@login')->name('post:login');
});

Route::post('logout', 'Auth\CustomLogoutController@logout')->name('post:logout');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'DashboardController@index')->name('get:dashboard:index');

	Route::resource('agents', 'AgentController');
	Route::resource('clients', 'ClientController');
	Route::resource('services', 'ServiceController');
});

Route::resource('users', 'UserController');