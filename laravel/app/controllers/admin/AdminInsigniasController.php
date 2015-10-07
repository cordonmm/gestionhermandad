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

}