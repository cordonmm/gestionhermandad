<?php

use Illuminate\Filesystem\Filesystem;

class AdminNoticiasController extends BaseController{

    protected $noticia;

    public function __construct(Noticia $noticia)
    {
        $this->noticia = $noticia;
    }

    public function getIndex()
    {
        // titulo
        $title = Lang::get('admin/entradas/title.entry_management');
        // Grab all the entrada posts

        $noticias = $this->noticia;

        // Show the page

        return View::make('admin/entradas/index', compact('entradas', 'title'));

    }

    public function noticiaCreate()
    {
        // Declare the rules for the form validation
        $rules = array(
            'titulo'   => 'required|min:3',
            'contenido' => 'required',
        );
        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success

        if ($validator->passes())
        {
            $noticia = new Noticia();

            $noticia->titulo            = Input::get('titulo');
            $noticia->contenido         = Input::get('contenido');

            // Was the entrada post created?

            if($noticia->save())
                return Redirect::to('gestionhdad')->with('success', Lang::get('Noticia creada correctamente'));


            return Redirect::to('gestionhdad')->with('error', Lang::get('admin/entradas/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('gestionhdad')->withInput()->withErrors($validator);
    }

    public function getShow($entrada)
    {
        // redirect to the frontend
    }

    /*public function getDelete($noticia)
    {
        // titulo
        $title = Lang::get('admin/entradas/title.entry_delete');
        // Show the page
        return View::make('admin/entradas/delete', compact('entrada', 'title'));
    }*/

    public function noticiaDelete($noticia)
    {

        $id = $noticia->id;
        $noticia->delete();
        $noticia = Noticia::find($id);

        if(empty($noticia))
        {
            return Redirect::to('gestionhdad')->with('success', Lang::get('admin/entradas/messages.delete.success'));
        }

        return Redirect::to('gestionhdad')->with('error', Lang::get('admin/entradas/messages.delete.error'));

    }




}