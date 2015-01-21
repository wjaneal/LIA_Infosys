<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fees', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sid');
			$table->date('date');
			$table->integer('applicationfee')->nullable();
			$table->integer('guardianshipfee')->nullable();
			$table->integer('tuitiondeposit')->nullable();
			$table->integer('tuitionsemester')->nullable();
			$table->integer('tuitionshortsemester')->nullable();
			$table->integer('tuitioncredit')->nullable();
			$table->integer('accommsinglefour')->nullable();
			$table->integer('accommsingletwo')->nullable();
			$table->integer('accommdoublefour')->nullable();
			$table->integer('accommdoubletwo')->nullable();
			$table->integer('residencedeposit')->nullable();
			$table->integer('mealfour')->nullable();
			$table->integer('mealtwo')->nullable();
			$table->integer('lunchonly')->nullable();
			$table->integer('twomeals')->nullable();
			$table->integer('lunchmonth')->nullable();
			$table->integer('uniform')->nullable();
			$table->integer('healthyear')->nullable();
			$table->integer('healthsix')->nullable();
			$table->integer('healththree')->nullable();
			$table->integer('airport')->nullable();
			$table->integer('activityfee')->nullable();
			$table->integer('homestayfee')->nullable();
			$table->integer('homestaytwo')->nullable();
			$table->integer('homestayfour')->nullable();
			$table->integer('materialsfee')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fees');
	}

}
