<?php

class Confighdad extends Eloquent {

    public $timestamps = false;
    protected $table = 'confighdad';

    public function nazarenos()
    {
        return $this->nazarenos;
    }

    public function tramos()
    {
        return $this->tramos;
    }

    public function preciopapeleta()
    {
        return $this->preciopapeleta;
    }

    public function cuota()
    {
        return $this->cuota;
    }

    public function logo()
    {
        return $this->logo;
    }

    public function descripcion()
    {
        return $this->descripcion;
    }

    public function nombre_hdad()
    {
        return $this->nombre_hdad;
    }



}