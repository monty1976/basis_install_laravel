<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adresses', function(Blueprint $table) {
                    $table->increments('id');
                    $table->string('street');
                    $table->integer('number');
                    $table->integer('postal_code')->unsigned();
                    $table->foreign('postal_code')->references('postal_code')->on('postals');
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
		Schema::drop('adresses');
	}

}
