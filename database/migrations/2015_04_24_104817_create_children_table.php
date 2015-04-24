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
		Schema::drop('children');
	}

}
