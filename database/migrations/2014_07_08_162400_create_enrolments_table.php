<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	Schema::create('enrolments', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('sid');
		$table->integer('cid');
		$table->datetime('date');
		$table->timestamps();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
 	Schema::drop('enrolments');		
	}

}
