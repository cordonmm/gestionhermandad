<?php

class TipoPapeleta extends Eloquent {

    public $timestamps = false;

    public function descripcion()
    {
        return $this->descripcion;
    }

    public function papeletas()
    {
        return $this->hasMany('Papeleta');
    }

}