<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestTypesTable extends Migration {

	public function up()
	{
		Schema::create('test_types', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50);
			$table->text('description')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('test_types');
	}
}