<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestTable extends Migration {

	public function up()
	{
		Schema::create('tests', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('origin')->unsigned();
			$table->char('code', 4);
			$table->integer('test_matrix_id')->unsigned()->nullable()->index();
			$table->char('grade_id', 6)->nullable();
			$table->string('name', 200);
			$table->text('description')->nullable();
			$table->smallInteger('no_of_questions');
			$table->integer('test_type_id')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->softDeletes();
			$table->integer('deleted_by')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('tests');
	}
}