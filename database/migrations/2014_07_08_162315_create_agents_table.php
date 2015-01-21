<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
/* 	Schema::create('agents', function(Blueprint $table) {
		$table->increments('id');
		$table->string('alname'); 
		$table->string('afname');
		$table->string('title'); 
		$table->string('jobtitle'); 
		$table->string('physicaladdress');
		$table->string('mailingaddress');
		$table->string('cphone');	
		$table->string('bphone');
		$table->string('email');
		$table->string('fax');
		$table->string('website');
		$table->string('paymentpreference');
		$table->string('payeename');
		#Bank info would be a complicated addition - keep simple for now:
		$table->text('bankinformation');
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
#	Schema::drop('agents');
	}

}
