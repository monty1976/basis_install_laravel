<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSleepsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sleeps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->time('start');
			$table->time('end');
			$table->date('date');
                        /*** Foreign key ***/
                        $table->integer('child_id')->unsigned();
                        $table->foreign('child_id')->references('id')->on('children');
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
		Schema::drop('sleeps');
	}

}
