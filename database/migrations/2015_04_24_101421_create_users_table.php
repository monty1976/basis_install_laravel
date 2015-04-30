<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('users', function(Blueprint $table) {
                $table->increments('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('username');
                $table->string('password', 60);
                $table->rememberToken();
                $table->string('email')->unique();
                
                /*** Foreign keys ***/
                $table->integer('role_id')->unsigned();
                $table->foreign('role_id')->references('id')->on('roles');
                
                $table->integer('image_id')->unsigned()->nullable();
                $table->foreign('image_id')->references('id')->on('images');
                
                $table->boolean('is_public');
                $table->integer('adress_id')->unsigned();
                $table->foreign('adress_id')->references('id')->on('adresses');
                
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
            Schema::drop('users');
	}

}
