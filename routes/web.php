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

	Route::get('adminProfile', 'ChangePasswordController@showProfile')->name('get:profile');
	Route::get('adminPassword', 'ChangePasswordController@showChangePass')->name('get:updatePass');
	Route::patch('adminPassword', 'ChangePasswordController@doChangePassword')->name('post:doUpdate');

	Route::get('agentProfile', 'ChangePasswordController@showProfile')->name('get:profile');
	Route::get('agentPassword', 'ChangePasswordController@showChangePass')->name('get:updatePass');
	Route::patch('agentPassword', 'ChangePasswordController@doChangePassword')->name('post:doUpdate');


	Route::resource('clients', 'ClientController');
	Route::resource('services', 'ServiceController');
	Route::resource('users', 'UserController');
	Route::get('get-services/{client}', 'ClientServiceController@showServices');
});


