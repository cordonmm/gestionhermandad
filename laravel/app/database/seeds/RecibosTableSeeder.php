<?php

class RecibosTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('recibos')->delete();

        $hermano_id = Hermano::first()->id;

        DB::table('recibos')->insert(array(
                array(
                    'hermano_id' => $hermano_id,
                    'concepto' => '2º semestre año 2014',
                    'fecha_cobro' => '2014/06/12',
                    'total' => 45.50,
                ),
                array(
                    'hermano_id' => ($hermano_id + 1),
                    'concepto' => 'Año 2014',
                    'fecha_cobro' => '2015/01/21',
                    'total' => 46.50,
                ))
        );
    }
}