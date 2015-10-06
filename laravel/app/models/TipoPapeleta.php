<?php

class TipoPapeleta extends Eloquent {

    public $timestamps = false;

    protected $table = 'tipos_papeleta';

    public function descripcion()
    {
        return $this->descripcion;
    }

    public function papeletas()
    {
        return $this->hasMany('Papeleta');
    }

}