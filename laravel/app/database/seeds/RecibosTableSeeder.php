<?php

class RecibosTableSeeder extends Seeder {

    public function run()
    {
        DB::table('recibos')->delete();

        $user_id = User::first()->id;

        DB::table('recibos')->insert( array(
                array(
                    'user_id'       => $user_id,
                    'cocepto'        => 'Año 2015',
                    'fecha_cobro'     => '2015/06/12',
                    'total'     => 45.50,
                ),
                array(
                    'user_id'       => $user_id,
                    'cocepto'        => 'Año 2014',
                    'fecha_cobro'     => '2015/01/21',
                    'total'     => 46.50,
                ))
        );
    }