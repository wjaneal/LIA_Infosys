<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
/*		Schema::create('parents', function($table)
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
			$table->('city');
			$table->('address1');
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
		#Schema::drop('parents');
	}

}
