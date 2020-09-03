<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
			$table->increments('id');
			$table->text('content');
			$table->integer('topic_id')->unsigned()->index();
			$table->integer('difficulty_id')->unsigned()->nullable()->index();
			$table->text('solution')->nullable();
			$table->timestamps();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->softDeletes();
			$table->integer('deleted_by')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('questions');
	}
}