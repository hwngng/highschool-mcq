<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopicsTable extends Migration {

	public function up()
	{
		Schema::create('topics', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('chapter_id')->unsigned()->nullable()->index();
			$table->integer('order_no')->unsigned()->default('0');
			$table->string('name', 200);
			$table->text('description')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('topics');
	}
}