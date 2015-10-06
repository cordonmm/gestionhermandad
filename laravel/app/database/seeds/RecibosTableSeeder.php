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
                    'concepto' => 'Abño 2015',
                    'fecha_cobro' => '2015/06/12',
                    'total' => 45.50,
                ),
                array(
                    'hermano_id' => ($hermano_id + 1),
                    'concepto' => 'Abño 2014',
                    'fecha_cobro' => '2015/01/21',
                    'total' => 46.50,
                ))
        );
    }
}