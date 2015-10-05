<?php

class InsigniasTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('insignias')->delete();

        $paso_id = Paso::first()->id;

        DB::table('insignias')->insert(array(
                array(
                    'paso_id' => $paso_id,
                    'descripcion' => 'CRUZ DE GUÍA',
                    'cantidad' => '1',
                ),
                array(
                    'paso_id' => ($paso_id + 1),
                    'descripcion' => 'BANDERA AZUL',
                    'cantidad' => '2',
                ))
        );
    }
}