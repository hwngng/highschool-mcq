<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChoicesTable extends Migration {

	public function up()
	{
		Schema::create('choices', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('question_id')->unsigned()->index();
			$table->text('content');
			$table->boolean('is_solution')->default(false);
		});
	}

	public function down()
	{
		Schema::drop('choices');
	}
}