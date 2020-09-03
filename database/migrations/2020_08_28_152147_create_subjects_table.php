<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectsTable extends Migration {

	public function up()
	{
		Schema::create('subjects', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->text('description')->nullable();
			$table->char('grade_id', 6)->nullable()->index();
		});
	}

	public function down()
	{
		Schema::drop('subjects');
	}
}