<?php

class ConfighdadTableSeeder extends Seeder {

    public function run()
    {
        DB::table('confighdad')->delete();


        DB::table('confighdad')->insert(array(
                array(
                    'nazarenos'             => 1100,
                    'tramos'                => 20,
                    'preciopapeleta'        => 0.0,
                    'cuota'                 => 75.2,
                    'logo'                  => '/template/img/logo.png',
                    'nombre_hdad'           => 'Hermandad del Museo',
                    'descripcion'           => 'Descripcion de Pruebas',

                ))
        );

    }

}
