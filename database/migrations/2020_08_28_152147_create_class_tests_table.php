<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassTestsTable extends Migration {

	public function up()
	{
		Schema::create('class_tests', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('class_id')->unsigned()->index();
			$table->integer('test_id')->unsigned()->nullable();
			$table->integer('test_matrix_id')->unsigned()->nullable();
			$table->datetime('start_at')->nullable();
			$table->datetime('end_at')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('class_tests');
	}
}