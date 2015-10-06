<?php

class HermanosTableSeeder extends Seeder {

    public function run()
    {
        DB::table('hermanos')->delete();

        $user_id = User::first()->id;

        DB::table('hermanos')->insert( array(
                array(
                    'user_id'       => $user_id,
                    'num_hermano'        => 12545,
                    'nombre'        => 'Manuel',
                    'apellidos'     => 'Cordón Pérez',
                    'fecha_nacimiento'     => '1990/02/15',
                    'fecha_alta'     => '1990/03/15',
                    'ccc'     => '00490110111111111115',
                    'direccion'  => 'Alquería, 3',
                    'poblacion'     => 'Dos Hermanas',
                    'cp'    => 41701,
                    'provincia'    => 'Sevilla',
                    'dni'     => '49090009M',
                    'tlf_fijo'     => 954723890,
                    'tlf_movil'     => 677169635,
                    'observaciones'    => 'No paga desde que nació.',
                    'pagado_hasta'    => new DateTime,

                ),
                array(
                    'user_id'       => ($user_id + 1),
                    'num_hermano'        => 12546,
                    'nombre'        => 'José',
                    'apellidos'     => 'Fernández Bueno',
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
                    'observaciones'    => 'No paga desde que nació. Y además le gustan los caballos.',
                    'pagado_hasta'    => new DateTime,

                ))
        );
    }


}
