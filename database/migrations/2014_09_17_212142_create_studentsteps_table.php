<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentstepsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('studentsteps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id');
			$table->integer('step_id');
			$table->integer('teacher_id');
			$table->integer('class_id');
			$table->date('date');
			$table->integer('step');
			$table->timestamps();
			$table->dateTime('deleted_at')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('studentsteps');
	}

}
