<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDifficultiesTable extends Migration {

	public function up()
	{
		Schema::create('difficulties', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->text('description')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('difficulties');
	}
}