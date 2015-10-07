<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Insignias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('insignias', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('paso_id')->unsigned();
			$table->string('descripcion');
			$table->integer('cantidad');
			$table->foreign('paso_id')->references('id')->on('pasos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('insignias', function (Blueprint $table) {
            $table->dropForeign('insignias_paso_id_foreign');

        });
        Schema::drop('insignias');

	}

}
