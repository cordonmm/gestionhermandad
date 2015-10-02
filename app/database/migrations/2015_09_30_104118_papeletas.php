<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Papeletas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('papeletas', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('hermano_id')->unsigned();
			$table->integer('tipo_id')->unsigned();
			$table->integer('insignia_id')->unsigned();
			$table->text('observaciones');
			$table->date('fecha_solicitud');
			$table->float('donativo');
			$table->boolean('recogida')->default(false);
			$table->foreign('tipo_id')->references('id')->on('tipos_papeleta');
			$table->foreign('insignia_id')->references('id')->on('insignias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('papeletas');
	}

}