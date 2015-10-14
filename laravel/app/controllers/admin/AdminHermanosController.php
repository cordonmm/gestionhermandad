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
            'ccc'                => 'max:20',
            'tlf_fijo'           => 'numeric|max:999999999',
            'tlf_movil'          => 'numeric|max:999999999',
            'email'              => 'required|email',
            'direccion'          => 'required|min:3',
            'poblacion'          => 'required|min:3',
            'cp'                 => 'required|numeric|max:99999',
            'provincia'          => 'required|min:3',
            'password'           => 'required|min:3',
            'fecha_alta'         => 'required|min:3',
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
            $hermano->fecha_alta        = Input::get('fecha_alta');
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
            $hermano->tipo_pago         = Input::get('tipo_pago');


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

    }

    public function hermanoCreate()
    {
        $rules = array(
            'nombre'             => 'required|min:3',
            'apellidos'          => 'required|min:3',
            'dni'          => 'required|min:3',
            'fecha_nacimiento'   => 'required|min:3',
            'ccc'                => 'max:20',
            'tlf_fijo'           => 'numeric|max:999999999',
            'tlf_movil'          => 'numeric|max:999999999',
            'email'              => 'required|email',
            'direccion'          => 'required|min:3',
            'poblacion'          => 'required|min:3',
            'cp'                 => 'required|numeric|max:99999',
            'provincia'          => 'required|min:3',
        );

        $num_hermano = DB::table('hermanos')->max('num_hermano');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            $hermano = new Hermano();


            $username = 'hermano'.($num_hermano+1);
            $pass = str_random(6);

            $user = new User();
            $user->username              = $username;
            $user->email                 = Input::get('email');
            $user->password              = $pass;
            $user->password_confirmation = $pass;
            $user->confirmation_code     = md5(uniqid(mt_rand(), true));

            if($user->save())
            {
                $role = Role::where('name','=','user')->first();
                $user = User::where('username','=',$username)->first();

                $user->attachRole($role);

                $hermano->user_id           = $user->id;
                $hermano->num_hermano       = ($num_hermano+1);
                $hermano->nombre            = Input::get('nombre');
                $hermano->apellidos         = Input::get('apellidos');
                $hermano->fecha_nacimiento  = Input::get('fecha_nacimiento');
                $hermano->fecha_alta        = date('Y-m-d');
                $hermano->ccc               = Input::get('ccc');
                $hermano->tlf_fijo          = Input::get('tlf_fijo');
                $hermano->tlf_movil         = Input::get('tlf_movil');
                $hermano->direccion         = Input::get('direccion');
                $hermano->poblacion         = Input::get('poblacion');
                $hermano->cp                = Input::get('cp');
                $hermano->provincia         = Input::get('provincia');
                $hermano->dni               = Input::get('dni');
                $hermano->observaciones     = Input::get('observaciones');
                $hermano->tipo_pago         = Input::get('tipo_pago');

                if($hermano->save())
                {
                    if (Config::get('confide::signup_email')) {
                        Mail::queueOn(
                            Config::get('confide::email_queue'),
                            Config::get('confide::email_account_confirmation'),
                            compact('user'),
                            function ($message) use ($user) {
                                $message
                                    ->to($user->email, $user->username)
                                    ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                            }
                        );
                    }
                    return Redirect::to('gestionhdad/hermanos/' . $hermano->id . '/ficha')->with('success', Lang::get('admin/entradas/messages.create.success'));
                }

            }

            return Redirect::to('gestionhdad/nuevo-hermano')->with('error', Lang::get('admin/entradas/messages.create.error'));
        }

        return Redirect::to('gestionhdad/nuevo-hermano')->withInput()->withErrors($validator);
    }

}