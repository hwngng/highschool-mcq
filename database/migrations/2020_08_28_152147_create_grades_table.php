<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradesTable extends Migration {

	public function up()
	{
		Schema::create('grades', function(Blueprint $table) {
			$table->char('id', 6)->primary();
		});
	}

	public function down()
	{
		Schema::drop('grades');
	}
}