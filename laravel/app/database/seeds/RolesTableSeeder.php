<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->save();

        $userRole = new Role;
        $userRole->name = 'user';
        $userRole->save();

        $user1 = User::where('username','=','admin')->first();
        $user1->attachRole( $adminRole );

        $user2 = User::where('username','=','hermano1')->first();
        $user2->attachRole( $userRole );
    }

}
