<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Recibos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recibos', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('hermano_id')->unsigned();
			$table->string('concepto');
			$table->date('fecha_cobro');
			$table->float('total');
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
        Schema::table('recibos', function (Blueprint $table) {
            $table->dropForeign('recibos_hermano_id_foreign');

        });
		Schema::drop('recibos');
	}

}
