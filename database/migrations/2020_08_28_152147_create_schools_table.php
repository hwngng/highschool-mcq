<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolsTable extends Migration {

	public function up()
	{
		Schema::create('schools', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->text('description')->nullable();
			$table->string('address', 200)->nullable();
			$table->integer('ward_id')->unsigned()->nullable()->index();
		});
	}

	public function down()
	{
		Schema::drop('schools');
	}
}