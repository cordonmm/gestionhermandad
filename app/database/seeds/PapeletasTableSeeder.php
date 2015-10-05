<?php

class PapeletasTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('papeletas')->delete();

        $hermano_id = Hermanos::first()->id;
        $tipo_id = TiposPapeleta::first()->id;

        DB::table('papeletas')->insert(array(
                array(
                    'hermano_id' => $hermano_id,
                    'tipo_id' => $tipo_id,
                    'insignia_id' => '2015/06/12',
                    'observaciones' => 'esto es una observacion',
                    'fecha_solicitud' => '2015/03/21',
                    'donativo' => 0,
                ),
                array(
                    'hermano_id' => ($hermano_id + 1),
                    'tipo_id' => $tipo_id,
                    'insignia_id' => '2015/06/12',
                    'observaciones' => 'esto es una observacion',
                    'fecha_solicitud' => '2015/03/21',
                    'donativo' => 0,
                ))
        );
    }

}