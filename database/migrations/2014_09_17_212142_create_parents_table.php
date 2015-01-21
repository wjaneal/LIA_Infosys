<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sid');
			$table->string('parent');
			$table->string('fname');
			$table->string('lname');
			$table->date('dob');
			$table->string('country');
			$table->string('state');
			$table->string('postalcode');
			$table->string('phone');
			$table->string('fax');
			$table->string('email');
			$table->timestamps();
			$table->string('city')->nullable();
			$table->string('address1')->nullable();
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
		Schema::drop('parents');
	}

}
