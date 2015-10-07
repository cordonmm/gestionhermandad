<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// Add calls to Seeders here
		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('HermanosTableSeeder');
		$this->call('HermanoHermanoTableSeeder');
		$this->call('PasosTableSeeder');
		$this->call('InsigniasTableSeeder');
		$this->call('RecibosTableSeeder');
		$this->call('TiposPapeletaTableSeeder');
		$this->call('PapeletasTableSeeder');
		$this->call('ReservasInsigniasTableSeeder');
        $this->call('ConfighdadTableSeeder');
    }

}
