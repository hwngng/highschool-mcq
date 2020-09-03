<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChaptersTable extends Migration {

	public function up()
	{
		Schema::create('chapters', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('subject_id')->unsigned()->nullable()->index();
			$table->integer('order_no')->unsigned()->default('0');
			$table->string('name', 200);
			$table->text('description')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('chapters');
	}
}