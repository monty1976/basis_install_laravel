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
                    $table->string('nursery_color');
                    $table->integer('nursery_type_id')->unsigned();
                    $table->foreign('nursery_type_id')->references('id')->on('nursery_types');
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
