<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGlobalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('globals', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('datakey')->nullable();
			$table->string('datavalue')->nullable();
			$table->timestamps();
			$table->string('datatext')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('globals');
	}

}
