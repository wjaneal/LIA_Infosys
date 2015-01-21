<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slname');
			$table->string('sfname');
			$table->string('snname');
			$table->string('country');
			$table->string('gender');
			$table->string('account_name');
			$table->string('encrypt_pass');
			$table->string('picture_location');
			$table->string('student_email_1');
			$table->string('flanguage');
			$table->string('immigration');
			$table->date('canada_doe');
			$table->date('lia_doe');
			$table->date('dob');
			$table->date('assessment_date');
			$table->text('education_note');
			$table->boolean('translator');
			$table->string('trans_relationship');
			$table->string('career');
			$table->string('recommendations');
			$table->integer('agentid');
			$table->dateTime('last_login');
			$table->timestamps();
			$table->integer('parent1')->nullable();
			$table->integer('parent2')->nullable();
			$table->integer('grade')->nullable();
			$table->string('address')->nullable();
			$table->string('city')->nullable();
			$table->string('postalcode')->nullable();
			$table->string('phone')->nullable();
			$table->integer('aid')->nullable();
			$table->date('liadod')->nullable();
			$table->string('status', 20)->nullable();
			$table->string('state', 30)->nullable();
			$table->dateTime('deleted_at')->default('0000-00-00 00:00:00');
			$table->string('emailstatus')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('students');
	}

}
