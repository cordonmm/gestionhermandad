<?php

class PasosTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('pasos')->delete();

        DB::table('pasos')->insert(array(
                array(
                    'descripcion' => 'Sagrada Expiraci�n de Nuestro Se�or Jesucristo',
                ),
                array(
                    'descripcion' => 'Mar�a Sant�sima de las Aguas',
                ))
        );
    }
}