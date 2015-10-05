<?php

class RecibosTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('recibos')->delete();

        $hermano_id = Hermanos::first()->id;
        $insignia_id = Insignias::first()->id;

        DB::table('recibos')->insert(array(
                array(
                    'hermano_id' => $hermano_id,
                    'insignia_id' => $insignia_id,
                    'fecha_solicitud' => '2015/02/12',
                    'estado' => 'solicitada',
                ),
                array(
                    'hermano_id' => ($hermano_id + 1),
                    'insignia_id' => $insignia_id,
                    'fecha_solicitud' => '2015/02/20',
                    'estado' => 'solicitada',
                ))
        );
    }
}