<?php

class DonativosTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('donativos')->delete();

        $hermano_id = Hermano::first()->id;

        DB::table('donativos')->insert(array(
                array(
                    'hermano_id' => $hermano_id,
                    'cantidad' => 20,
                    'observaciones' => 'mi primera donación',
                    'fecha_donacion' => '2015/10/22',
                ),
                array(
                    'hermano_id' => ($hermano_id + 1),
                    'cantidad' => 20,
                    'observaciones' => 'mi primera donación',
                    'fecha_donacion' => '2015/10/22',
                ))
        );
    }
}