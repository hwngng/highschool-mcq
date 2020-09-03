<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassMembersTable extends Migration {

	public function up()
	{
		Schema::create('class_members', function(Blueprint $table) {
			$table->integer('class_id')->unsigned();
			$table->integer('user_id')->unsigned()->index();
			$table->timestamps();
			$table->primary(['class_id', 'user_id']);
		});
	}

	public function down()
	{
		Schema::drop('class_members');
	}
}