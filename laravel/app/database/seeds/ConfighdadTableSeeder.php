<?php

class ConfighdadTableSeeder extends Seeder {

    public function run()
    {
        DB::table('confighdad')->delete();


        DB::table('confighdad')->insert(array(
                array(
                    'nazarenos'              => 1100,
                    'tramos'                 => 20,
                    'preciopapeleta'         => 0.0,
                    'fecha_inicio_insignias' => '2016/02/01',
                    'fecha_fin_insignias'    => '2016/02/29',
                    'fecha_inicio_papeletas' => '2016/03/01',
                    'fecha_fin_papeletas'    => '2016/03/15',
                    'cuota'                  => 59,
                    'cuota_menor'            => 54,
                    'logo'                   => '/template/img/logo.png',
                    'nombre_hdad'            => 'Hermandad del Museo',
                    'descripcion'            => 'Descripcion de Pruebas',

                ))
        );

    }

}
