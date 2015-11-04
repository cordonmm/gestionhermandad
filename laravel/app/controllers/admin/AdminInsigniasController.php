<?php

use Illuminate\Filesystem\Filesystem;

class AdminInsigniasController extends BaseController{

    protected $insignia;

    public function __construct(Insignia $insignia)
    {
        $this->insignia = $insignia;
    }

    public function getFicha($insignia)
    {
        return View::make('site/admin/ficha-insignia', compact('insignia'));
    }

    public function insigniaEdit($insignia)
    {
        $rules = array(
            'descripcion'             => 'required|min:3',
            'cantidad'                => 'required|numeric',
        );
        // Validate the inputs

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {

            // Update the entrada post data

            $insignia->paso_id           = Input::get('paso_id');
            $insignia->descripcion       = Input::get('descripcion');
            $insignia->cantidad          = Input::get('cantidad');


            // Was the entrada post updated?


            if($insignia->save())
            {
                return Redirect::to('gestionhdad/insignias/' . $insignia->id . '/ficha')->with('success', 'Datos modificados correctamente');
            }

            // Redirect to the entradas post management page
            return Redirect::to('gestionhdad/insignias/' . $insignia->id . '/ficha')->with('error', 'Error');
        }

        // Form validation failed
        return Redirect::to('gestionhdad/insignias/' . $insignia->id . '/ficha')->withInput()->withErrors($validator);

    }

    public function insigniaCreate()
    {
        $rules = array(
            'descripcion'        => 'required|min:3',
            'cantidad'           => 'required|numeric',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            $insignia = new Insignia();


            $insignia->descripcion     = Input::get('descripcion');
            $insignia->cantidad        = Input::get('cantidad');
            $insignia->paso_id         = Input::get('paso_id');

            if($insignia->save())
            {
                return Redirect::to('gestionhdad/insignias/' . $insignia->id . '/ficha')->with('success', Lang::get('admin/entradas/messages.create.success'));
            }

            return Redirect::to('gestionhdad/nueva-insignia')->with('error', Lang::get('admin/entradas/messages.create.error'));
        }

        return Redirect::to('gestionhdad/nueva-insignia')->withInput()->withErrors($validator);
    }

    public function asignacionAutomatica()
    {

        $hoy = date('Y-m-d');

        // SELECCIONO TODOS LOS HERMANOS ACTIVOS, ORDENADOS POR FECHA DE ALTA ASCENCENTE
        $hermanos = Hermano::orderBy('fecha_alta', 'asc')
            ->where('activo', '=', '1')
            ->where('pagado_hasta', '>=', $hoy)
            ->get();


        $anyo_ant =  date('Y') - 1;
        $fin_anyo_ant = $anyo_ant.'-12-31';

        foreach($hermanos as $hermano)
        {

            $hermano_reservas = DB::table('reservas_insignia')
                ->where('estado','LIKE', 'asignada')
                ->where('hermano_id','=', $hermano->id)
                ->where('hermano_id','=', $hermano->id)
                ->where('fecha_solicitud','>', $fin_anyo_ant)
                ->count();

            if($hermano_reservas == 0) {
                // SELECCIONO TODAS LAS RESERVAS DE INSIGNIAS QUE HA REALIZADO CADA HERMANO, CUYO ESTADO SEA SOLICITADA, Y ORDENADAS ASCENDENTEMENTE POR PRIORIDAD
                $reservas = DB::table('reservas_insignia as ri')
                    ->select
                    (
                        'hermanos.nombre', 'hermanos.apellidos', 'hermanos.num_hermano', 'hermanos.id as hid', 'hermanos.fecha_alta',
                        'insignias.cantidad', 'insignias.descripcion', 'ri.fecha_solicitud', 'ri.insignia_id as i_id',
                        'ri.prioridad', 'ri.estado', 'ri.id as ri_id'
                    )
                    ->join('hermanos', 'ri.hermano_id', '=', 'hermanos.id')
                    ->join('insignias', 'ri.insignia_id', '=', 'insignias.id')
                    ->where('estado', 'LIKE', 'solicitada')
                    ->where('hermano_id', '=', $hermano->id)
                    ->where('fecha_solicitud','>', $fin_anyo_ant)
                    ->where('cantidad', '>', DB::raw("(select count(*) as cantidada from reservas_insignia where insignia_id = ri.insignia_id and estado like 'asignada')"))
                    ->orderBy('prioridad', 'asc')
                    ->first();

                if ($reservas != null) {
                    //echo $reservas->cantidad.'<br>';
                    $cantidad_reservada = DB::table('reservas_insignia')->where('insignia_id', '=', $reservas->i_id)->where('estado', '=', 'asignada')->count();

                    //ASIGNO AL HERMANO LA INSINIA QUE TENIA RESERVADA CON UNA MAYOR PRIORIDAD
                    DB::table('reservas_insignia')
                        ->where('id', '=', $reservas->ri_id)
                        ->where('fecha_solicitud','>', $fin_anyo_ant)
                        ->update(array('estado' => 'asignada'));

                    if ($reservas->cantidad <= $cantidad_reservada) {
                        //CANCELO TODAS LAS RESERVAS PARA LA MISMA INSIGNIA DE OTROS HERMANOS
                        DB::table('reservas_insignia')
                            ->where('id', '<>', $reservas->ri_id)
                            ->where('insignia_id', '=', $reservas->i_id)
                            ->where('fecha_solicitud','>', $fin_anyo_ant)
                            ->update(array('estado' => 'cancelada'));
                    }

                    //CANCELO EL RESTO DE RESERVAS QUE TENIA REALIZADA EL HERMANO EN CUESTION
                    DB::table('reservas_insignia')
                        ->where('id', '<>', $reservas->ri_id)
                        ->where('hermano_id', '=', $reservas->hid)
                        ->where('fecha_solicitud','>', $fin_anyo_ant)
                        ->update(array('estado' => 'cancelada'));
                }
            }
        }

        return Redirect::to('gestionhdad/listado-insignias-reservadas')->with('success', 'Insignias asignadas automaticamente.');

    }

    public function insigniaReservas()
    {
        $insignias=Input::get("insignias");

        if(Auth::user()->hasRole('admin'))
            $hermano = Input::get('hermano');
        else
            $hermano = Input::get('hermano_id');

        $max_prioridad = DB::table('reservas_insignia')
            ->where('hermano_id', '=', Input::get('hermano_id'))
            ->max('prioridad');

        $cont = 1 ;

        for ($i=0; $i<count($insignias); $i++)
        {
            DB::table('reservas_insignia')->insert(array(
                array('hermano_id' =>  $hermano, 'insignia_id' => $insignias[$i], 'fecha_solicitud' => date('Y-m-d'), 'prioridad' => ($max_prioridad+$cont), 'estado' => 'solicitada'),
            ));
            $cont++;
        }

        return Redirect::to('gestionhdad/reserva-insignias')->with('success', Lang::get('admin/entradas/messages.create.success'));
    }

    public function altaHermano($hermano_id)
    {
        $hermano = Hermano::find($hermano_id);

        $hermano->activo = 1;

        if($hermano->save())
        {
            return Redirect::to('gestionhdad/listado-hermanos')->with('success', 'Marcada como recogida corregida correctamente');
        }
    }


    public function asignarReservaInsignia($ri_id, $i_id, $h_id)
    {
        $anyo_ant =  date('Y') - 1;
        $fin_anyo_ant = $anyo_ant.'-12-31';

        $hermano_reservas = DB::table('reservas_insignia')
            ->where('estado','LIKE', 'asignada')
            ->where('hermano_id','=', $h_id)
            ->where('fecha_solicitud','>', $fin_anyo_ant)
            ->count();

        if($hermano_reservas == 0)
        {
            $cantidad = Insignia::select('cantidad')->where('id', '=', $i_id)->first();

            $cantidad_reservada = DB::table('reservas_insignia')->where('insignia_id', '=', $i_id)->where('estado', '=', 'asignada')->where('fecha_solicitud','>', $fin_anyo_ant)->count();

            if($cantidad->cantidad > $cantidad_reservada)
            {
                DB::table('reservas_insignia')
                    ->where('id', $ri_id)
                    ->where('fecha_solicitud','>', $fin_anyo_ant)
                    ->update(array('estado' => 'asignada'));

                return Redirect::to('gestionhdad/listado-insignias-reservadas')->with('success', 'Reserva asignada correctamente');
            }else{
                return Redirect::to('gestionhdad/listado-insignias-reservadas')->with('error', 'Esta insignia ya está reservada en su totalidad');
            }
        }else{
            return Redirect::to('gestionhdad/listado-insignias-reservadas')->with('error', 'No se puede asignar más de una insignia a un mismo hermano');
        }


    }

    public function desasignarReservaInsignia($ri_id)
    {
        DB::table('reservas_insignia')
            ->where('id', $ri_id)
            ->update(array('estado' => 'solicitada'));

        if(Auth::user()->hasRole('admin'))
            return Redirect::to('gestionhdad/listado-insignias-reservadas')->with('success', 'Reserva desasignada correctamente');
        else
            return Redirect::to('gestionhdad/misinsignias')->with('success', 'Reserva desasignada correctamente');
    }

    public function cancelarReservaInsignia($ri_id)
    {
        $priodidad_hermano = DB::table('reservas_insignia')
            ->select('prioridad', 'hermano_id')
            ->where('id', '=', $ri_id)
            ->first();

        $max_prioridad = DB::table('reservas_insignia')
            ->where('hermano_id', '=', $priodidad_hermano->hermano_id)
            ->max('prioridad');

        for($i = (($priodidad_hermano->prioridad)+1); $i<=$max_prioridad; $i++){

            DB::table('reservas_insignia')
                ->where('hermano_id', '=', $priodidad_hermano->hermano_id)
                ->where('prioridad', '=', $i)
                ->decrement('prioridad', 1);
        }

        DB::table('reservas_insignia')->where('id', '=', $ri_id)->delete();

        if(Auth::user()->hasRole('admin'))
            return Redirect::to('gestionhdad/listado-insignias-reservadas')->with('success', 'Reserva cancelada correctamente');
        else
            return Redirect::to('gestionhdad/misinsignias')->with('success', 'Reserva cancelada correctamente');

    }

}