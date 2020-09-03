<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkHistoriesTable extends Migration {

	public function up()
	{
		Schema::create('work_histories', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('test_id')->unsigned();
			$table->smallInteger('no_of_correct')->default('0');
			$table->datetime('started_at')->nullable();
			$table->datetime('ended_at')->nullable();
			$table->datetime('submitted_at')->nullable();
			$table->text('note')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('work_histories');
	}
}