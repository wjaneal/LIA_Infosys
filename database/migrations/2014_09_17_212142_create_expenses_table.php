<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sid');
			$table->date('date');
			$table->boolean('applicationfee')->nullable();
			$table->boolean('guardianshipfee')->nullable();
			$table->integer('tuitiondeposit')->nullable();
			$table->boolean('tuitionsemester')->nullable();
			$table->boolean('tuitionshortsemester')->nullable();
			$table->boolean('tuitioncredit')->nullable();
			$table->boolean('accommsinglefour')->nullable();
			$table->boolean('accommsingletwo')->nullable();
			$table->boolean('accommdoublefour')->nullable();
			$table->boolean('accommdoubletwo')->nullable();
			$table->boolean('residencedeposit')->nullable();
			$table->boolean('mealfour')->nullable();
			$table->boolean('mealtwo')->nullable();
			$table->boolean('lunchonly')->nullable();
			$table->boolean('twomeals')->nullable();
			$table->boolean('lunchmonth')->nullable();
			$table->boolean('uniform')->nullable();
			$table->boolean('healthyear')->nullable();
			$table->boolean('healthsix')->nullable();
			$table->boolean('healththree')->nullable();
			$table->boolean('airport')->nullable();
			$table->integer('total')->nullable();
			$table->timestamps();
			$table->boolean('activityfee')->nullable();
			$table->integer('meals')->nullable();
			$table->integer('months')->nullable();
			$table->integer('tuitionsem0')->nullable();
			$table->integer('tuitionsem1')->nullable();
			$table->integer('tuitionsem2')->nullable();
			$table->integer('tuitionsem3')->nullable();
			$table->integer('scholarshiptotal')->nullable();
			$table->string('mealplan', 10)->nullable();
			$table->integer('credits')->nullable();
			$table->integer('depositpaid')->nullable();
			$table->integer('health')->nullable();
			$table->string('filename')->nullable();
			$table->string('directory')->nullable();
			$table->integer('scholarshipcredits')->nullable();
			$table->integer('homestayfee')->nullable();
			$table->integer('homestaytwo')->nullable();
			$table->integer('homestayfour')->nullable();
			$table->string('invoicenumber', 15)->nullable();
			$table->integer('materialsfee')->nullable();
			$table->integer('healthamount')->nullable();
			$table->integer('tuitionsem0amount')->nullable();
			$table->integer('tuitionsem1amount')->nullable();
			$table->integer('tuitionsem2amount')->nullable();
			$table->integer('tuitionsem3amount')->nullable();
			$table->string('student')->nullable();
			$table->string('acc0')->nullable();
			$table->string('acc1')->nullable();
			$table->string('acc2')->nullable();
			$table->string('acc3')->nullable();
			$table->integer('acc0amount')->nullable();
			$table->integer('acc1amount')->nullable();
			$table->integer('acc2amount')->nullable();
			$table->integer('acc3amount')->nullable();
			$table->string('status')->nullable();
			$table->dateTime('deleted_at')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expenses');
	}

}
