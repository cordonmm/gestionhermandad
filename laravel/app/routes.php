<?php

//MODELOS
Route::model('hermano', 'Hermano');
Route::model('insignia', 'Insignia');

//PATRONES
Route::pattern('hermano', '[0-9]+');
Route::pattern('insignia', '[0-9]+');


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
Route::group(array('prefix' => 'gestionhdad', 'after' => 'auth'), function() {
    Route::get('/', function () {
        return View::make('site/welcome');
    });

    Route::get('inicio', function () {
        return View::make('site/welcome');
    });
    Route::get('misdatos', function () {
        $hermano = Hermano::where('user_id','=', Auth::user()->id)->first();
        return View::make('site/misdatos', compact('hermano'));
    });
    Route::get('misrecibos', function () {
        return View::make('site/misrecibos');
    });
    Route::get('papeleta', function () {
        return View::make('site/papeleta');
    });
    Route::get('nuevo-hermano', function () {
        return View::make('site/admin/nuevo-hermano');
    });
    Route::get('listado-hermanos', function () {
        return View::make('site/admin/listado-hermanos');
    });
    Route::get('nueva-insignia', function () {
        return View::make('site/admin/nueva-insignia');
    });
    Route::get('listado-insignias', function () {
        return View::make('site/admin/listado-insignias');
    });
    Route::get('configuracion', function () {
        return View::make('site/admin/configuracion');
    });
    Route::get('reserva-insignias', function () {
        return View::make('site/admin/reserva-insignias');
    });

    //HERMANOS
    Route::get('hermanos/{hermano}/ficha','AdminHermanosController@getFicha');
    Route::post('hermanos/{hermano}/editar','AdminHermanosController@hermanoEdit');
    Route::post('hermanos/crear','AdminHermanosController@hermanoCreate');

    //INSIGNIAS
    Route::get('insignias/{insignia}/ficha','AdminInsigniasController@getFicha');
    Route::post('insignias/{insignia}/editar','AdminInsigniasController@insigniaEdit');
    Route::post('insignias/crear','AdminInsigniasController@insigniaCreate');
    Route::post('insignias/reservar','AdminInsigniasController@insigniaReservas');

    //CONFIGURACION
    Route::post('configuracion/editar','AdminConfiguracionController@configuracionEdit');
    //
});
Route::get('/', function () {
    return View::make('site/hello');
});
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
