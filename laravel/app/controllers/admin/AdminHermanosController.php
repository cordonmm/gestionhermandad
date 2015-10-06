<?php

use Illuminate\Filesystem\Filesystem;

class AdminHermanosController extends BaseController{

    protected $hermano;

    public function __construct(Hermano $hermano)
    {
        $this->hermano = $hermano;
    }

    public function getFicha($hermano)
    {
        return View::make('site/admin/ficha', compact('hermano'));
    }

    public function hermanoEdit($hermano)
    {
        $rules = array(
            'nombre'             => 'required|min:3',
            'apellidos'          => 'required|min:3',
            'fecha_nacimiento'   => 'required|min:3',
            'ccc'                => 'required|min:3',
            'tlf_fijo'           => 'numeric|max:9',
            'tlf_movil'          => 'numeric|max:90',
            'email'              => 'required|email',
            'direccion'          => 'required|min:3',
            'poblacion'          => 'required|min:3',
            'cp'                 => 'required|numeric|max:5',
            'provincia'          => 'required|min:3',
            'password'           => 'required|min:3',
        );
        // Validate the inputs

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            // Update the entrada post data

            $hermano->nombre            = Input::get('nombre');
            $hermano->apellidos         = Input::get('apellidos');
            $hermano->fecha_nacimiento  = Input::get('fecha_nacimiento');
            $hermano->ccc               = Input::get('ccc');
            $hermano->tlf_fijo          = Input::get('tlf_fijo');
            $hermano->tlf_movil         = Input::get('tlf_movil');
            $hermano->user->email       = Input::get('contenido');
            $hermano->direccion         = Input::get('direccion');
            $hermano->poblacion         = Input::get('poblacion');
            $hermano->cp                = Input::get('cp');
            $hermano->provincia         = Input::get('provincia');
            $hermano->user->password    = Input::get('password');
            $hermano->observaciones     = Input::get('observaciones');


            // Was the entrada post updated?
            DB::beginTransaction();

            if($hermano->save())
            {
                if($hermano->user->save())
                {
                    DB::commit();
                    return Redirect::to('site/admin/hermanos/' . $hermano->id . '/ficha')->with('success', Lang::get('site/admin/hermanos/ficha/messages.update.success'));
                }else{
                    DB::rollback();
                }
            }

            // Redirect to the entradas post management page
            return Redirect::to('site/admin/hermanos/' . $hermano->id . '/ficha')->with('error', Lang::get('site/admin/hermanos/ficha/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('site/admin/hermanos/' . $hermano->id . '/ficha')->withInput()->withErrors($validator);

    }

}