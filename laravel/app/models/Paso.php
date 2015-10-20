<?php

class Paso extends Eloquent {

    public $timestamps = false;

    public function descripcion()
    {
        return $this->descripcion;
    }

    public function insignias()
    {
        return $this->hasMany('Insignia', 'paso_id');
    }
    public function papeletas()
    {
        return $this->hasMany('Papeleta', 'paso_id');
    }

}