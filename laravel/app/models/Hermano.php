<?php

class Hermano extends Eloquent {

    public $timestamps = false;




    public function nombre()
    {
        return $this->nombre;
    }

    public function apellidos()
    {
        return $this->apellidos;
    }

    public function fecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function fecha_alta()
    {
        return $this->fecha_alta;
    }

    public function ccc()
    {
        return $this->ccc;
    }

    public function direccion()
    {
        return $this->direccion;
    }

    public function poblacion()
    {
        return $this->poblacion;
    }

    public function cp()
    {
        return $this->cp;
    }

    public function provincia()
    {
        return $this->provincia;
    }

    public function dni()
    {
        return $this->dni;
    }

    public function tlf_fijo()
    {
        return $this->tlf_fijo;
    }

    public function tlf_movil()
    {
        return $this->tlf_movil;
    }

    public function observaciones()
    {
        return $this->observaciones;
    }

    public function pagado_hasta()
    {
        return new DateTime($this->pagado_hasta);
    }

    public function activo()
    {
        return $this->activo;
    }
    public function tipo_pago()
    {
        return $this->tipo_pago;
    }

    public function user()
    {
        return $this->hasOne('User', 'id', 'user_id');
    }

    public function recibos()
    {
        return $this->hasMany('Recibo', 'hermano_id');
    }

    public function recibospendientes()
    {
        $recibos = 0;
        $finaño = new DateTime(date("Y").'-12-31');
        $diferencia = $this->pagado_hasta()->diff($finaño);
        $meses = ( $diferencia->y * 12 ) + $diferencia->m;
        switch($this->tipo_pago()){
            case 'mensual':
                $recibos = $meses;
                break;
            case 'semestral':
                $recibos = ceil($meses / 6);
                break;
            case 'anual':
                $recibos = ceil($meses / 12);
                break;
        }
        return $recibos;
    }


    public function papeletas()
    {
        return $this->hasMany('Papeleta', 'hermano_id');
    }

    public function parentescos()
    {
        return $this->belongsToMany('Hermano', 'hermano_hermano','hermano1_id', 'hermano2_id');
    }

    public function insigniasReservadas()
    {
        return $this->belongsToMany('Insignia', 'reservas_insignia','insignia_id', 'hermano_id');
    }

}