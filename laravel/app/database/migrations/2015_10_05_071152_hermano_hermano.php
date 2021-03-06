<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HermanoHermano extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hermano_hermano', function ($table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('hermano1_id')->unsigned();
			$table->integer('hermano2_id')->unsigned();
			$table->string('parentesco');
			$table->foreign('hermano1_id')->references('id')->on('hermanos');
			$table->foreign('hermano2_id')->references('id')->on('hermanos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('hermano_hermano', function (Blueprint $table) {
            $table->dropForeign('hermano_hermano_hermano1_id_foreign');
            $table->dropForeign('hermano_hermano_hermano2_id_foreign');

        });
		Schema::drop('hermano_hermano');
	}

}
