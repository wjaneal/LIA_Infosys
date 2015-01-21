<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStepsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('steps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('category');
			$table->text('element');
			$table->integer('subelement');
			$table->integer('step');
			$table->text('text');
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
		Schema::drop('steps');
	}

}
