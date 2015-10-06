<?php

class Paso extends Eloquent {

    /**
     * Devuelve la descripcion del Paso
     *
     * @return string
     */

    public function descripcion()
    {
        return $this->descripcion;
    }

}