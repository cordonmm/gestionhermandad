<?php

class Papeleta extends Eloquent {

    public $timestamps = false;

    public function observaciones()
    {
        return $this->observaciones;
    }

    public function fecha_solicitud()
    {
        return $this->date($this->fecha_solicitud);
    }

    public function donativo()
    {
        return $this->donativo;
    }

    public function recogida()
    {
        return $this->recogida;
    }

    public function tipo()
    {
        return $this->belongsTo('TipoPapeleta');
    }

    public function insignia()
    {
        return $this->belongsTo('Insignia');
    }

    public function hermano()
    {
        return $this->belongsTo('Hermano');
    }

}