<?php
class Noticia extends Eloquent {

    public function titulo()
    {
        return $this->titulo;
    }

    public function contenido()
    {
        return nl2br($this->contenido);
    }

    public function fecha_creacion()
    {
        return $this->date($this->fecha_creacion);
    }
}