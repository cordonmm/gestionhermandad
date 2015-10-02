<?php

class PasosTableSeeder extends Seeder {

    public function run()
    {
        DB::table('pasos')->delete();

        $user_id = User::first()->id;

        DB::table('pasos')->insert( array(
                array(
                    'descripcion'        => 'Sagrada Expiraci�n de Nuestro Se�or Jesucristo',
                ),
                array(
                    'descripcion'        => 'Mar�a Sant�sima de las Aguas',
                ))
        );
    }