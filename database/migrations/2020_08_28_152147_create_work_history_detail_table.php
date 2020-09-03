<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkHistoryDetailTable extends Migration {

	public function up()
	{
		Schema::create('work_history_detail', function(Blueprint $table) {
			$table->integer('work_history_id')->unsigned();
			$table->integer('question_id')->unsigned();
			$table->string('choice_ids', 50);
			$table->datetime('last_updated')->nullable();
			$table->primary(['work_history_id', 'question_id']);
		});
	}

	public function down()
	{
		Schema::drop('work_history_detail');
	}
}