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
			$table->date('date_from');
                        $table->date('date_to');
			$table->time('time_start');
			$table->time('time_end');
                        /*** Foreign key ***/
                        $table->integer('child_id')->unsigned();
                        $table->foreign('child_id')->references('id')->on('children');
                        
                        $table->integer('form_type_id')->unsigned();
                        $table->foreign('form_type_id')->references('id')->on('form_types');
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
