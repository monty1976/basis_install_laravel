<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodplansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('foodplans', function(Blueprint $table) {
            $table->increments('id');
            $table->string('mandag');
            $table->string('tirsdag');
            $table->string('onsdag');
            $table->string('torsdag');
            $table->string('fredag');
            $table->date('date_start');
            $table->date('date_end');
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
		Schema::drop('foodplans');
	}

}
