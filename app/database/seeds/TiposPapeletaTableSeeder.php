<?php

class TiposPapeletaTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('tipos_papeleta')->delete();

        $user_id = User::first()->id;

        DB::table('tipos_papeleta')->insert(array(
                array(
                    'descripcion' => 'Cirio',
                ),
                array(
                    'descripcion' => 'Costalero',
                ),
                array(
                    'descripcion' => 'Capataz',
                ),
                array(
                    'descripcion' => 'Diputado',
                ),
                array(
                    'descripcion' => 'Insignia',
                ))
        );
    }
}