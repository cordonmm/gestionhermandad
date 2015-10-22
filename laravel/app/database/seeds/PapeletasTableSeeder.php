<?php

class PapeletasTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('papeletas')->delete();

        $hermano_id = Hermano::first()->id;
        $tipo_id = TipoPapeleta::first()->id;
        $insignia_id = Insignia::first()->id;
        $paso_id = Paso::first()->id;

        DB::table('papeletas')->insert(array(
                array(
                    'hermano_id' => $hermano_id,
                    'tipo_id' => $tipo_id,
                    'insignia_id' => $insignia_id,
                    'paso_id' => $paso_id,
                    'observaciones' => 'esto es una observacion',
                    'fecha_solicitud' => '2015/03/21',
                    'donativo' => 0,
                ),
                array(
                    'hermano_id' => ($hermano_id + 1),
                    'tipo_id' => $tipo_id,
                    'insignia_id' => ($insignia_id + 1),
                    'paso_id' => $paso_id,
                    'observaciones' => 'esto es una observacion',
                    'fecha_solicitud' => '2015/03/21',
                    'donativo' => 0,
                ))
        );
    }

}