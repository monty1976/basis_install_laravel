<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('headline', 100);
                        $table->text('content');
                        $table->date('date');
                        /*** Foreign key ***/
                        $table->integer('nurseries_id')->unsigned();
                        $table->foreign('nurseries_id')->references('id')->on('nurseries');
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
		Schema::drop('activities');
	}

}
