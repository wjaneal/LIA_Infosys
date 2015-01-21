<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('alname');
			$table->string('afname');
			$table->string('title');
			$table->string('jobtitle');
			$table->string('cphone');
			$table->string('bphone');
			$table->string('email');
			$table->string('fax');
			$table->string('website');
			$table->string('paymentpreference');
			$table->string('payeename');
			$table->text('bankinformation');
			$table->string('agenttype')->nullable();
			$table->string('city')->nullable();
			$table->string('postalcode')->nullable();
			$table->string('country')->nullable();
			$table->string('address')->nullable();
			$table->timestamps();
			$table->integer('aid')->nullable();
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
		Schema::drop('agents');
	}

}
