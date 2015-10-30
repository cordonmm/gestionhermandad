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

    Route::get('recibos-pendientes', function () {
        return View::make('site/admin/recibos-pendientes');
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

        $fecha_inicio_insignias = Confighdad::first()->fecha_inicio_insignias;
        $fecha_fin_insignias = Confighdad::first()->fecha_fin_insignias;
        $hoy = date('Y-m-d');

        if($hoy < $fecha_inicio_insignias) {
            if (Auth::user()->hasRole('user'))
            {
                return Redirect::to('/gestionhdad/inicio')->with('info','El plazo para reservar insignias estará disponible a partir del '.date('d/m/Y', strtotime($fecha_inicio_insignias)));
            }
        }

        return View::make('site/admin/reserva-insignias');
    });

    Route::get('donativo', function () {
        return View::make('site/donativo');
    });
    Route::get('pagarRecibo', 'AdminRecibosController@getPayRecibo');

    Route::get('hermano/crearRecibo', 'AdminRecibosController@crearRecibo');


    //NOTICIAS
    Route::post('noticias/crear','AdminNoticiasController@noticiaCreate');

    //HERMANOS
    Route::get('hermanos/{hermano}/ficha','AdminHermanosController@getFicha');
    Route::post('hermanos/{hermano}/editar','AdminHermanosController@hermanoEdit');
    Route::post('hermanos/crear','AdminHermanosController@hermanoCreate');
    Route::post('parentescos/{hermano_id}/crear','AdminHermanosController@parentescoCreate');
    Route::get('parentescos/{familiar_id}/{hermano_id}/eliminar','AdminHermanosController@parentescoDelete');
    Route::get('hermanos/{hermano_id}/baja','AdminHermanosController@bajaHermano');
    Route::get('hermanos/{hermano_id}/alta','AdminHermanosController@altaHermano');

    //INSIGNIAS
    Route::get('insignia-reservada/{ri_id}/{i_id}/{h_id}/asignar','AdminInsigniasController@asignarReservaInsignia');
    Route::get('insignia-reservada/{ri_id}/desasignar','AdminInsigniasController@desasignarReservaInsignia');
    Route::get('insignia-reservada/{ri_id}/cancelar','AdminInsigniasController@cancelarReservaInsignia');
    Route::get('insignias/{insignia}/ficha','AdminInsigniasController@getFicha');
    Route::get('insignias/asignacion-automatica','AdminInsigniasController@asignacionAutomatica');
    Route::post('insignias/{insignia}/editar','AdminInsigniasController@insigniaEdit');
    Route::post('insignias/crear','AdminInsigniasController@insigniaCreate');
    Route::post('insignias/reservar','AdminInsigniasController@insigniaReservas');

    Route::get('listado-insignias-reservadas', function () {
        $anyo_ant =  date('Y') - 1;
        $fin_anyo_ant = $anyo_ant.'-12-31';

        $insignias = DB::table('reservas_insignia')
            ->select('hermanos.nombre', 'hermanos.apellidos', 'hermanos.num_hermano', 'hermanos.fecha_alta', 'hermanos.id as h_id', 'insignias.descripcion',
                'reservas_insignia.fecha_solicitud', 'reservas_insignia.prioridad', 'reservas_insignia.estado', 'reservas_insignia.id as ri_id', 'reservas_insignia.insignia_id as i_id')
            ->join('hermanos', 'reservas_insignia.hermano_id', '=', 'hermanos.id')
            ->join('insignias', 'reservas_insignia.insignia_id', '=', 'insignias.id')
            ->where('fecha_solicitud','>', $fin_anyo_ant)
            ->get();
        return View::make('site/admin/listado-reservas-insignias', compact('insignias'));
    });

    Route::get('misinsignias', function () {
        $anyo_ant =  date('Y') - 1;
        $fin_anyo_ant = $anyo_ant.'-12-31';

        $user_id = Auth::user()->id;

        $insignias = DB::table('reservas_insignia')
            ->select('hermanos.nombre', 'hermanos.apellidos', 'hermanos.num_hermano', 'hermanos.fecha_alta', 'insignias.descripcion', 'reservas_insignia.fecha_solicitud', 'reservas_insignia.prioridad', 'reservas_insignia.estado', 'reservas_insignia.id as ri_id')
            ->join('hermanos', 'reservas_insignia.hermano_id', '=', 'hermanos.id')
            ->join('insignias', 'reservas_insignia.insignia_id', '=', 'insignias.id')
            ->where('fecha_solicitud','>', $fin_anyo_ant)
            ->where('user_id','=', $user_id)
            ->get();
        return View::make('site/misinsignias', compact('insignias'));
    });

    //Cofradia
    Route::get('cofradia', function () {
        return View::make('site/cofradia');
    });
    //PAPELETAS
    Route::get('papeleta', 'AdminPapeletasController@papeletaCreate');
    Route::post('papeleta', 'AdminPapeletasController@postCreate');
    Route::get('listado-papeletas', function () {
        $anyo_ant =  date('Y') - 1;
        $fin_anyo_ant = $anyo_ant.'-12-31';

        $papeletas = DB::table('papeletas')
            ->select('hermanos.nombre', 'hermanos.apellidos', 'hermanos.num_hermano', 'hermanos.fecha_alta', 'insignias.descripcion as idescrip', 'tipos_papeleta.descripcion as tpdescrip', 'papeletas.fecha_solicitud', 'papeletas.donativo', 'papeletas.observaciones', 'papeletas.recogida', 'papeletas.id as id_papeleta')
            ->join('hermanos', 'papeletas.hermano_id', '=', 'hermanos.id')
            ->join('insignias', 'papeletas.insignia_id', '=', 'insignias.id')
            ->join('tipos_papeleta', 'papeletas.tipo_id', '=', 'tipos_papeleta.id')
            ->where('fecha_solicitud','>', $fin_anyo_ant)
            ->get();

        return View::make('site/admin/listado-papeletas', compact('papeletas'));
    });
    Route::get('{papeleta_id}/cancelar-papeleta','AdminPapeletasController@cancelarPapeleta');
    Route::get('{papeleta_id}/recogida','AdminPapeletasController@marcarPapeletaRecogida');
    Route::get('{papeleta_id}/norecogida','AdminPapeletasController@desmarcarPapeletaRecogida');

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
