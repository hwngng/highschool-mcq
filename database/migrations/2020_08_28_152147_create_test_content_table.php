<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestContentTable extends Migration {

	public function up()
	{
		Schema::create('test_content', function(Blueprint $table) {
			$table->integer('test_id')->unsigned();
			$table->integer('question_id')->unsigned()->index();
			$table->integer('question_order')->default('0');
			$table->integer('answer_order')->default('1234');
			$table->primary(['test_id', 'question_id']);
		});
	}

	public function down()
	{
		Schema::drop('test_content');
	}
}