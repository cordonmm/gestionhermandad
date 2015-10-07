<?php

use Illuminate\Filesystem\Filesystem;


class AdminConfiguracionController extends BaseController{

    protected $configuracion;

    public function configuracionEdit()
    {

        $configuracion = Confighdad::first();

        $rules = array(
            'nazarenos'              => 'required|numeric',
            'tramos'                 => 'required|numeric',
            'preciopapeleta'         => 'required|numeric',
            'cuota'                  => 'required|numeric',
            'cuota_menor'            => 'required|numeric',
            'fecha_inicio_insignias' => 'required',
            'fecha_fin_insignias'    => 'required',
            'fecha_inicio_papeletas' => 'required',
            'fecha_fin_papeletas'    => 'required',
            'nombre_hdad'            => 'required',
            'descripcion'            => 'required',
        );
        // Validate the inputs

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {

            if(Input::file('logo'))
            {
                $target_dir = public_path()."/template/css/images";
                $fileName = 'logo.png';

                Input::file('logo')->move($target_dir, $fileName);
            }



            $configuracion->nazarenos               = Input::get('nazarenos');
            $configuracion->tramos                  = Input::get('tramos');
            $configuracion->cuota                   = Input::get('cuota');
            $configuracion->cuota_menor             = Input::get('cuota_menor');
            $configuracion->preciopapeleta          = Input::get('preciopapeleta');
            $configuracion->fecha_inicio_insignias  = Input::get('fecha_inicio_insignias');
            $configuracion->fecha_fin_insignias     = Input::get('fecha_fin_insignias');
            $configuracion->fecha_inicio_papeletas  = Input::get('fecha_inicio_papeletas');
            $configuracion->fecha_fin_papeletas     = Input::get('fecha_fin_papeletas');
            $configuracion->nombre_hdad             = Input::get('nombre_hdad');
            $configuracion->descripcion             = Input::get('descripcion');


            // Was the entrada post updated?

            if($configuracion->save())
            {
                return Redirect::to('gestionhdad/configuracion')->with('success', 'Datos modificados correctamente');
            }

            // Redirect to the entradas post management page
            return Redirect::to('gestionhdad/configuracion')->with('error', 'Error');
        }

        // Form validation failed
        return Redirect::to('gestionhdad/configuracion')->withInput()->withErrors($validator);

    }

}