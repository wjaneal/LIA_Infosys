<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tlname');
			$table->string('tfname');
			$table->string('tnname');
			$table->string('home_room');
			$table->string('account_name');
			$table->string('picture_location');
			$table->string('cell_phone');
			$table->string('encrypt_pass');
			$table->string('email');
			$table->string('last_login');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teachers');
	}

}
