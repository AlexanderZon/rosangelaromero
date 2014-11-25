<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProgrammersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('programmers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_employee');
			$table->integer('id_service');
			$table->integer('id_shift');
			$table->date('program_date');
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
		Schema::drop('programmers');
	}

}
