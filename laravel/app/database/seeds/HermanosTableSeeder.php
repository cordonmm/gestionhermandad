<?php

class HermanosTableSeeder extends Seeder {

    public function run()
    {
        DB::table('hermanos')->delete();

        $user_id = User::first()->id;

        DB::table('hermanos')->insert( array(
                array(
                    'user_id'              => $user_id,
                    'num_hermano'          => 12545,
                    'nombre'               => 'Manuel',
                    'apellidos'            => 'Cordon Perez',
                    'sexo'                 => 'H',
                    'fecha_nacimiento'     => '1990/02/15',
                    'fecha_alta'           => '1990/03/15',
                    'ccc'                  => '00490110111111111115',
                    'direccion'            => 'Alqueria, 3',
                    'poblacion'            => 'Dos Hermanas',
                    'cp'                   => 41701,
                    'provincia'            => 'Sevilla',
                    'dni'                  => '49090009M',
                    'tlf_fijo'             => 954723890,
                    'tlf_movil'            => 677169635,
                    'foto'                 => '',
                    'observaciones'        => 'No paga desde que nació.',
                    'pagado_hasta'         => '2014-12-31',
                    'tipo_pago'            =>  'semestral',

                ),
                array(
                    'user_id'       => ($user_id + 1),
                    'num_hermano'        => 12546,
                    'nombre'        => 'Jose',
                    'apellidos'     => 'Fernandez Bueno',
                    'sexo'          => 'H',
                    'fecha_nacimiento'     => '1991/06/15',
                    'fecha_alta'     => '1991/07/15',
                    'ccc'     => '00490110111122222115',
                    'direccion'  => 'Utrera, 33',
                    'poblacion'     => 'Los Molares',
                    'cp'    => 41750,
                    'provincia'    => 'Sevilla',
                    'dni'     => '48090009M',
                    'tlf_fijo'     => 964723890,
                    'tlf_movil'     => 644169635,
                    'foto'                 => '',
                    'observaciones'    => 'No paga desde que nació. Y además le gustan los caballos.',
                    'pagado_hasta'    => '2014-12-31',
                    'tipo_pago' =>  'anual',

                ),
                array(
                    'user_id'       => ($user_id + 2),
                    'num_hermano'        => 12545,
                    'nombre'        => 'Mercedes',
                    'apellidos'     => 'García',
                    'sexo'          => 'M',
                    'fecha_nacimiento'     => '1959/02/15',
                    'fecha_alta'     => '1990/03/15',
                    'ccc'     => '00490110111111111115',
                    'direccion'  => 'Bailen, 3',
                    'poblacion'     => 'Sevilla',
                    'cp'    => 41701,
                    'provincia'    => 'Sevilla',
                    'dni'     => '48855559J',
                    'tlf_fijo'     => 955556558,
                    'tlf_movil'     => 612458547,
                    'foto'                 => '',
                    'observaciones'    => 'No hay',
                    'pagado_hasta'    => '2014-12-31',
                    'tipo_pago' =>  'semestral',

                ),
                array(
                    'user_id'       => ($user_id + 3),
                    'num_hermano'        => 12545,
                    'nombre'        => 'Javier',
                    'apellidos'     => 'Cobos',
                    'sexo'          => 'H',
                    'fecha_nacimiento'     => '1945/02/15',
                    'fecha_alta'     => '1990/03/15',
                    'ccc'     => '00490110111111111115',
                    'direccion'  => 'Avda. de España, 3',
                    'poblacion'     => 'Sevilla',
                    'cp'    => 41701,
                    'provincia'    => 'Sevilla',
                    'dni'     => '47788889K',
                    'tlf_fijo'     => 958788552,
                    'tlf_movil'     => 678888999,
                    'foto'                 => '',
                    'observaciones'    => 'Es el Mayordomo de la Hermandad',
                    'pagado_hasta'    => '2014-12-31',
                    'tipo_pago' =>  'anual',

                ))
        );
    }


}
