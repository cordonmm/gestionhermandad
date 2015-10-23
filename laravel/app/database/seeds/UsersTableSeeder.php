<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();


        DB::table('users')->insert(array(
                array(
                    'username'      => 'admin',
                    'email'      => 'mcordon@10code.es',
                    'password'   => Hash::make('admin'),
                    'confirmed'   => 1,
                    'confirmation_code' => md5(microtime().Config::get('app.key')),
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'username'      => 'hermano1',
                    'email'      => 'macordonperez@gmail.com',
                    'password'   => Hash::make('admin'),
                    'confirmed'   => 1,
                    'confirmation_code' => md5(microtime().Config::get('app.key')),
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'username'      => 'hermano2',
                    'email'      => 'cordonperez@1gmail.com',
                    'password'   => Hash::make('admin'),
                    'confirmed'   => 1,
                    'confirmation_code' => md5(microtime().Config::get('app.key')),
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'username'      => 'hermano3',
                    'email'      => 'jfernandez@10code.es',
                    'password'   => Hash::make('user'),
                    'confirmed'   => 1,
                    'confirmation_code' => md5(microtime().Config::get('app.key')),
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ))
        );

    }

}
