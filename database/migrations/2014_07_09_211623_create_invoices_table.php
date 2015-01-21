<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
/*	Schema::create('invoices', function($table)
		{
	        $table->increments('id');
                $table->integer('sid');
                $table->date('date');
                $table->boolean('applicationfee');
                $table->boolean('guardianshipfee');
                $table->boolean('tuitiondeposit');
                $table->boolean('tuitionsemester');
                $table->boolean('tuitionshortsemester');
                $table->boolean('tuitioncredit');
                $table->boolean('accommsinglefour');
                $table->boolean('accommsingletwo');
                $table->boolean('accommdoublefour');
                $table->boolean('accommdoubletwo');
                $table->boolean('residencedeposit');
                $table->boolean('mealfour');
                $table->boolean('mealtwo');
                $table->boolean('lunchonly');
                $table->boolean('twomeals');
                $table->boolean('lunchmonth');
                $table->boolean('uniform');
                $table->boolean('healthyear');
                $table->boolean('healthsix') ;
                $table->boolean('healththree');
                $table->boolean('airport');
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
#	Schema::drop('invoices'); 
	}

}
