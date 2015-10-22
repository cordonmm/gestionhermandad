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
        $fecha_inicio_papeletas = Confighdad::first()->fecha_inicio_papeletas;
        $fecha_fin_papeletas = Confighdad::first()->fecha_fin_papeletas;
        $hoy = date('Y-m-d');
        if($hoy >= $fecha_inicio_papeletas and $fecha_fin_papeletas >= $hoy){
            if(Auth::user()->hasRole('admin')){
                $hermanos = Hermano::where('activo','=',1)->get();
                $papeleta = new Papeleta();
                return View::make('site/papeleta', compact('hermanos','papeleta'));
            }
            if(Auth::user()->hasRole('user')){


                $papeleta = Papeleta::where('fecha_solicitud','>=',$fecha_inicio_papeletas)->where('fecha_solicitud','<=',$fecha_fin_papeletas)->first();
                if(!isset($papeleta)){
                    $papeleta = new Papeleta();
                }
                return View::make('site/papeleta', compact('papeleta'));
            }
        }else{
            return Redirect::to('/gestionhdad/inicio')->with('error', 'No está permitido solicitar papelestas de sitio hasta el '.date('d-m-Y',strtotime($fecha_inicio_papeletas)));
        }

    }

}