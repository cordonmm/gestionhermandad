<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hermanos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		Schema::create('hermanos', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('nombre');
			$table->string('apellidos');
			$table->date('fecha_nacimiento');
			$table->date('fecha_alta');
			$table->string('ccc');
			$table->string('direccion');
			$table->string('poblacion');
			$table->integer('cp');
			$table->string('provincia');
			$table->string('dni');
			$table->integer('tlf_fijo');
			$table->integer('tlf_movil');
			$table->text('observaciones');
			$table->date('pagado_hasta');
			$table->boolean('activo')->default(true);
			$table->foreign('user_id')->references('id')->on('users');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hermanos');
	}

}
