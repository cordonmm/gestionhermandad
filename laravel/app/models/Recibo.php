<?php

class Recibo extends Eloquent {

    public $timestamps = false;

    public function concepto()
    {
        return $this->concepto;
    }

    public function fecha_cobro()
    {
        return $this->date($this->fecha_cobro);
    }

    public function total()
    {
        return $this->total;
    }

    public function hermano()
    {
        return $this->belongsTo('Hermano');
    }

}