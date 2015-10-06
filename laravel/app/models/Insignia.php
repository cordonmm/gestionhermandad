<?php

class Insignia extends Eloquent {

    public $timestamps = false;

    public function descripcion()
    {
        return $this->descripcion;
    }

    public function cantidad()
    {
        return $this->cantidad;
    }

    public function paso()
    {
        return $this->belongsTo('Paso');
    }

    public function insigniasPorHermano()
    {
        return $this->belongsToMany('Hermano', 'reservas_insignia','hermano_id', 'insignia_id');
    }

}