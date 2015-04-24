<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('description');
			$table->date('date');
			$table->time('time_start');
			$table->time('time_end');
                        /*** Foreign key ***/
                        $table->integer('children_id')->unsigned();
                        $table->foreign('children_id')->references('id')->on('children');
                        
                        $table->integer('form_types_id')->unsigned();
                        $table->foreign('form_types_id')->references('id')->on('form_types');
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
		Schema::drop('forms');
	}

}
