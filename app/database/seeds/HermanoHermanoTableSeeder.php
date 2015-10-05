<?php

class HermanoHermanoTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('hermano_hermano')->delete();

        $hermano1 = Hermano::first()->id;
        $hermano2 = $hermano1 + 1;

        DB::table('hermano_hermano')->insert(array(
                array(
                    'hermano1_id' => $hermano1,
                    'hermano2_id' => $hermano2,
                    'parentesco' => 'ahpimo',
                ),
                array(
                    'hermano1_id' => $hermano2,
                    'hermano2_id' => $hermano1,
                    'parentesco' => 'ahpimo',
                ))
        );
    }
}