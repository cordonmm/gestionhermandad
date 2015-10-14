<?php

class PasosTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('pasos')->delete();

        DB::table('pasos')->insert(array(
                array(
                    'descripcion' => 'CRISTO',
                ),
                array(
                    'descripcion' => 'PALIO',
                ))
        );
    }
}