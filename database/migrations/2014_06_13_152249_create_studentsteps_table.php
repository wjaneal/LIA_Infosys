<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentstepsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

/*	Schema::create('studentsteps', function(Blueprint $table) {
		$table->increments('id');
		$table->integer('student_id');
		$table->integer('step_id');
		$table->integer('teacher_id');	
		$table->integer('class_id');
		$table->date('date');
		$table->integer('step');
		$table->timestamps();
		}
		);*/
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
