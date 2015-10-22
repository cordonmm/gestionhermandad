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
            $table->integer('paso_id')->unsigned();
			$table->text('observaciones');
			$table->date('fecha_solicitud');
			$table->float('donativo');
			$table->boolean('recogida')->default(false);
			$table->foreign('tipo_id')->references('id')->on('tipos_papeleta');
			$table->foreign('insignia_id')->references('id')->on('insignias');
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
        Schema::table('papeletas', function (Blueprint $table) {
            $table->dropForeign('papeletas_tipo_id_foreign');
            $table->dropForeign('papeletas_insignia_id_foreign');
            $table->dropForeign('papeletas_paso_id_foreign');

        });
		Schema::drop('papeletas');
	}

}
