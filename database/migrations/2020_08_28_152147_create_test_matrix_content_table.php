<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestMatrixContentTable extends Migration {

	public function up()
	{
		Schema::create('test_matrix_content', function(Blueprint $table) {
			$table->integer('test_matrix_id')->unsigned();
			$table->integer('topic_id')->unsigned();
			$table->integer('difficulty_id')->unsigned();
			$table->tinyInteger('quantity')->unsigned();
			$table->primary(['test_matrix_id', 'topic_id', 'difficulty_id'], 'test_matrix_id_topic_id_difficulty_id');
		});
	}

	public function down()
	{
		Schema::drop('test_matrix_content');
	}
}