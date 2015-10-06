<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('site/welcome');
});

Route::get('inicio', function()
{
    return View::make('site/welcome');
});
Route::get('misdatos', function()
{
    return View::make('site/misdatos');
});
Route::get('misrecibos', function()
{
    return View::make('site/misrecibos');
});
Route::get('papeleta', function()
{
    return View::make('site/papeleta');
});
Route::get('listado-hermanos', function()
{
    return View::make('site/admin/listado-hermanos');
});
//

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
//
