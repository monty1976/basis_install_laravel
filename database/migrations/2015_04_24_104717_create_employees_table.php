<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('first_name');
                        $table->string('last_name');
                        $table->string('username');
                        $table->string('password');
                        $table->string('email')->unique();
                        /*** Foreign keys ***/
                        $table->integer('role_id')->unsigned();
                        $table->foreign('role_id')->references('id')->on('roles');
                        $table->integer('image_id')->unsigned();
                        $table->foreign('image_id')->references('id')->on('images');
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
		Schema::drop('employees');
	}

}
