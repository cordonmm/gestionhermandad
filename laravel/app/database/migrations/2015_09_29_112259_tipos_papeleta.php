<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TiposPapeleta extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipos_papeleta', function ($table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('descripcion');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()	{

		Schema::drop('tipos_papeleta');
	}

}
