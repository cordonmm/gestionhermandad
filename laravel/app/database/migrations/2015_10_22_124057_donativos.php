<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Donativos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donativos', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('hermano_id')->unsigned();
			$table->integer('cantidad')->unsigned();
			$table->longtext('observaciones');
			$table->date('fecha_donacion');
			$table->foreign('hermano_id')->references('id')->on('hermanos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donativos');
	}

}
