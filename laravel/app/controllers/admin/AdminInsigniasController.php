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

    public function insigniaReservas()
    {
        $insignias=Input::get("insignias");

        for ($i=0; $i<count($insignias); $i++)
        {
            DB::table('reservas_insignia')->insert(array(
                array('hermano_id' =>  Input::get('hermano'), 'insignia_id' => $insignias[$i], 'fecha_solicitud' => date('Y-m-d'), 'prioridad' => ($i+1), 'estado' => 'solicitada'),
            ));
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


    public function asignarReservaInsignia($ri_id)
    {
        DB::table('reservas_insignia')
            ->where('id', $ri_id)
            ->update(array('estado' => 'asignada'));

        return Redirect::to('gestionhdad/listado-insignias-reservadas')->with('success', 'Reserva asignada correctamente');
    }

    public function desasignarReservaInsignia($ri_id)
    {
        DB::table('reservas_insignia')
            ->where('id', $ri_id)
            ->update(array('estado' => 'solicitada'));

        return Redirect::to('gestionhdad/listado-insignias-reservadas')->with('success', 'Reserva desasignada correctamente');
    }

    public function cancelarReservaInsignia($ri_id)
    {
        DB::table('reservas_insignia')->where('id', '=', $ri_id)->delete();

        return Redirect::to('gestionhdad/listado-insignias-reservadas')->with('success', 'Reserva cancelada correctamente');

    }

}