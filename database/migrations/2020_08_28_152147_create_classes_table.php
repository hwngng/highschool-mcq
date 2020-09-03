<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassesTable extends Migration {

	public function up()
	{
		Schema::create('classes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50)->index();
			$table->char('grade_id', 6)->nullable();
			$table->integer('school_id')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('created_by')->unsigned()->nullable();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('classes');
	}
}