<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReferralsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('referrals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('aid');
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
			$table->timestamp('deleted_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('referrals');
	}

}
