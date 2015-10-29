<?php

class Donativo extends Eloquent {

    public $timestamps = false;
    protected $table = 'donativos';
    public function cantidad()
    {
        return $this->cantidad;
    }

    public function fecha_donacion()
    {
        return $this->date($this->fecha_donacion);
    }

    public function observaciones()
    {
        return $this->observaciones;
    }


    public function hermano()
    {
        return $this->belongsTo('Hermano');
    }

}