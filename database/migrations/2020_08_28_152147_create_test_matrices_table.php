<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestMatricesTable extends Migration {

	public function up()
	{
		Schema::create('test_matrices', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 300);
			$table->text('description')->nullable();
			$table->smallInteger('duration');
			$table->timestamps();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->softDeletes();
			$table->integer('deleted_by')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('test_matrices');
	}
}