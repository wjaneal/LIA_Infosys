<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
/*	Schema::create('referrals', function($table)
		{
		$table->increments('id');
		#Agent id:
		$table->integer('aid');
		#Student id - to be confirmed by marketing department:
		$table->integer('sid'); 
		$table->integer('grade'); 
		$table->string('slname');
		$table->string('sfname');
                $table->string('country');
                $table->string('gender');
                $table->string('street'); 
                $table->string('apartment'); 
                $table->string('city'); 
                $table->string('dob');
		$table->string('state'); 
                $table->string('postalcode'); 
                $table->string('student_email_1');		
		});	*/
	//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
#	Schema::drop('referrals');
	}

}
