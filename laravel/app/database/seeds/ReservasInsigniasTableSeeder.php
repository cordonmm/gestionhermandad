<?php

class ReservasInsigniasTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('reservas_insignia')->delete();

        $hermano_id = Hermano::first()->id;
        $insignia_id = Insignia::first()->id;

        DB::table('reservas_insignia')->insert(array(
                array(
                    'hermano_id' => $hermano_id,
                    'insignia_id' => $insignia_id,
                    'fecha_solicitud' => '2015/02/12',
                    'estado' => 'solicitada',
                ),
                array(
                    'hermano_id' => ($hermano_id + 1),
                    'insignia_id' => ($insignia_id + 1),
                    'fecha_solicitud' => '2015/02/20',
                    'estado' => 'solicitada',
                ))
        );
    }
}