<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservasInsignia extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservas_insignia', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('hermano_id')->unsigned();
			$table->integer('insignia_id')->unsigned();
			$table->date('fecha_solicitud');
			$table->string('estado');
			$table->foreign('hermano_id')->references('id')->on('hermanos');
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
        Schema::table('reservas_insignia', function (Blueprint $table) {
            $table->dropForeign('reservas_insignia_hermano_id_foreign');
            $table->dropForeign('reservas_insignia_insignia_id_foreign');

        });
		Schema::drop('reservas_insignia');
	}

}
