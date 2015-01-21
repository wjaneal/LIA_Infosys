<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
/*		Schema::create('fees', function($table)
                {
                $table->increments('id');
                $table->integer('sid');
                $table->date('date');
                $table->integer('applicationfee');
                $table->integer('guardianshipfee');
                $table->integer('tuitiondeposit');
                $table->integer('tuitionsemester');
                $table->integer('tuitionshortsemester');
                $table->integer('tuitioncredit');
                $table->integer('accommsinglefour');
                $table->integer('accommsingletwo');
                $table->integer('accommdoublefour');
                $table->integer('accommdoubletwo');
                $table->integer('residencedeposit');
                $table->integer('mealfour');
                $table->integer('mealtwo');
                $table->integer('lunchonly');
                $table->integer('twomeals');
                $table->integer('lunchmonth');
                $table->integer('uniform');
                $table->integer('healthyear');
                $table->integer('healthsix') ;
                $table->integer('healththree');
                $table->integer('airport');
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
#	Schema::drop('fees'); 
	}

}
