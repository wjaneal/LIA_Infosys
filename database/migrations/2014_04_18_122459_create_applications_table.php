<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
/*		Schema::create('applications', function(Blueprint $table) {
                        $table->increments('id');
                        $table->string('slname');
                        $table->string('sfname');
                        $table->string('snname');
                        $table->string('country');
                        $table->string('gender');
			$table->string('street'); 
			$table->string('apartment'); 
			$table->string('city'); 
			$table->string('state'); 
			$table->string('postalcode'); 
			$table->string('email');
                        $table->string('student_email_1');
			$table->string('englishlevel'); 
			$table->string('account_name');
                        $table->string('encrypt_pass');
                        $table->string('picture_location');
                        $table->string('flanguage');
                        $table->string('immigration');
                        $table->date('dob');
                        $table->datetime('last_login');
			$table->boolean('applicationfee');
			$table->boolean('deposit'); 
			$table->boolean('visaaccepted');	
			$table->boolean('arrived');
                        $table->timestamps();
		} ); */
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		#Schema::drop('applications');
	}

}
