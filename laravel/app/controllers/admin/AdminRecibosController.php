<?php

use Illuminate\Filesystem\Filesystem;

class AdminRecibosController extends BaseController{

    protected $recibo;

    public function __construct(Recibo $recibo)
    {
        $this->recibo = $recibo;
    }

    /*public function getFicha($hermano)
    {
        return View::make('site/admin/ficha', compact('hermano'));
    }

    public function hermanoEdit($hermano)
    {
        $rules = array(
            'nombre'             => 'required|min:3',
            'apellidos'          => 'required|min:3',
            'fecha_nacimiento'   => 'required|min:3',
            'ccc'                => 'max:20',
            'tlf_fijo'           => 'numeric|max:999999999',
            'tlf_movil'          => 'numeric|max:999999999',
            'email'              => 'required|email',
            'direccion'          => 'required|min:3',
            'poblacion'          => 'required|min:3',
            'cp'                 => 'required|numeric|max:99999',
            'provincia'          => 'required|min:3',
            'password'           => 'required|min:3',
        );
        // Validate the inputs

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            $user = User::find($hermano->user_id);
            // Update the entrada post data

            $hermano->nombre            = Input::get('nombre');
            $hermano->apellidos         = Input::get('apellidos');
            $hermano->fecha_nacimiento  = Input::get('fecha_nacimiento');
            $hermano->ccc               = Input::get('ccc');
            $hermano->tlf_fijo          = Input::get('tlf_fijo');
            $hermano->tlf_movil         = Input::get('tlf_movil');
            $user->email                = Input::get('email');
            $hermano->direccion         = Input::get('direccion');
            $hermano->poblacion         = Input::get('poblacion');
            $hermano->cp                = Input::get('cp');
            $hermano->provincia         = Input::get('provincia');
            $user->password             = Input::get('password');
            $hermano->observaciones     = Input::get('observaciones');


            // Was the entrada post updated?
            DB::beginTransaction();

            if($hermano->save())
            {
                if($user->save())
                {
                    DB::commit();
                    return Redirect::to('gestionhdad/hermanos/' . $hermano->id . '/ficha')->with('success', 'Datos modificados correctamente');
                }else{
                    DB::rollback();
                }
            }

            // Redirect to the entradas post management page
            return Redirect::to('gestionhdad/hermanos/' . $hermano->id . '/ficha')->with('error', 'Error');
        }

        // Form validation failed
        return Redirect::to('gestionhdad/hermanos/' . $hermano->id . '/ficha')->withInput()->withErrors($validator);

    }*/

}