<?php

class PasosTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('pasos')->delete();

        DB::table('pasos')->insert(array(
                array(
                    'descripcion' => 'Sagrada Expiración de Nuestro Señor Jesucristo',
                ),
                array(
                    'descripcion' => 'María Santísima de las Aguas',
                ))
        );
    }
}