<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpendituresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenditures', function(Blueprint $table)
		{
			$table->string('category')->nullable();
			$table->string('subcategory')->nullable();
			$table->string('amount')->nullable();
			$table->integer('id', true);
			$table->string('description')->nullable();
			$table->timestamps();
			$table->date('date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expenditures');
	}

}
