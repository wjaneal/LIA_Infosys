<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssessorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
/*		Schema::table('assessors', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('sid'); 
			$table->integer('tid');
			$table->date('assessment_date');
			$table->timestamps();

		});*/
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		#Schema::drop('assessors');
	}

}
