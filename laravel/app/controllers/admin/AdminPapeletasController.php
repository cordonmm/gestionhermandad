<?php

use Illuminate\Filesystem\Filesystem;

class AdminPapeletasController extends BaseController{

    protected $papeleta;

    public function __construct(Papeleta $papeleta)
    {
        $this->insignia = $papeleta;
    }

    public function cancelarPapeleta($papeleta_id)
    {
        $papeleta = Papeleta::find($papeleta_id);

        $papeleta->delete();

        return Redirect::to('gestionhdad/listado-papeletas')->with('success', 'Papeleta eliminada correctamente');
    }

    public function marcarPapeletaRecogida($papeleta_id)
    {
        $papeleta = Papeleta::find($papeleta_id);

        $papeleta->recogida = 1;

        if($papeleta->save())
        {
            return Redirect::to('gestionhdad/listado-papeletas')->with('success', 'Marcada como recogida corregida correctamente');
        }
    }

    public function papeletaCreate()
    {
        /*$rules = array(
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

        return Redirect::to('gestionhdad/nueva-insignia')->withInput()->withErrors($validator);*/
    }

}