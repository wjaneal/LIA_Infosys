<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
/*	Schema::create('documents', function(Blueprint $table)
		{
	
		$table->increments('id');
		$table->integer('sid');
		$table->string('description' );
		$table->string('directory');
		$table->string('filename');
		$table->timestamps();
		//
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	#	Schema::drop('documents');
	
			//
	
	}

}
