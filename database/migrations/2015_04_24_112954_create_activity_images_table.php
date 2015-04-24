<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity_images', function(Blueprint $table)
		{
			//$table->increments('id');
                        $table->integer('activities_id')->unsigned();
			$table->integer('image_id')->unsigned();
			$table->primary(['activities_id', 'image_id']);
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
		Schema::drop('activity_images');
	}

}
