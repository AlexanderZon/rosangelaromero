<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('identification_number');
			$table->string('sex');
			$table->date('born_date');
			$table->string('born_place');
			$table->string('marital_status');
			$table->integer('familiar_burden');
			$table->integer('children_number');
			$table->string('training_degree');
			$table->date('admission_date');
			$table->string('address');
			$table->string('phone');
			$table->string('type');
			$table->string('status');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employees');
	}

}
