<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('children', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('first_name');
                        $table->string('last_name');
                        $table->date('birthday');
                        /*** Foreign key ***/
                        $table->integer('nursery_id')->unsigned();
                        $table->foreign('nursery_id')->references('id')->on('nurseries');

                        $table->integer('image_id')->unsigned();
                        $table->foreign('image_id')->references('id')->on('images');

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
		Schema::drop('children');
	}

}
