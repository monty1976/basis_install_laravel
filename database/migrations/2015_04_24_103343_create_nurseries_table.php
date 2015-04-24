<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNurseriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nurseries', function(Blueprint $table) {
                    $table->increments('id');
                    $table->string('nursery_name');
                    $table->integer('nursery_types_id')->unsigned();
                    $table->foreign('nursery_types_id')->references('id')->on('nursery_types');
                    $table->timestamps();
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nurseries');
	}

}
