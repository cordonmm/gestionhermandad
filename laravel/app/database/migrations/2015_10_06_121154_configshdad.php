<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Configshdad extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('confighdad', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->Integer('nazarenos')->default(1100);
            $table->Integer('tramos')->default(20);
            $table->Float('preciopapeleta');
            $table->Date('fecha_inicio_insignias');
            $table->Date('fecha_fin_insignias');
            $table->Date('fecha_inicio_papeletas');
            $table->Date('fecha_fin_papeletas');
            $table->Float('cuota');
            $table->String('logo');
            $table->String('nombre_hdad');
            $table->String('descripcion');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('confighdad');
	}

}
