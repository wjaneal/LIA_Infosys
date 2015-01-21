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
/*		Schema::create('students', function(Blueprint $table) {
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
                        $table->mediumText('education_note');
                        $table->boolean('translator');
                        $table->string('trans_relationship');
                        $table->string('career');
                        $table->string('recommendations');
                        $table->integer('agentid');
			$table->datetime('last_login');
			$table->integer('parent1');
			$table->integer('parent2');
			$table->integer('grade');
			$table->string('address');
			$table->string('city');
			$table->string('postalcode');
			$table->string('phone');
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
#		Schema::drop('students');
	}

}
