<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('username', 100)->unique();
			$table->string('email', 100)->nullable();
			$table->string('password', 100)->nullable();
			$table->rememberToken('remember_token');
			$table->string('first_name', 100);
			$table->string('last_name', 100);
			$table->string('avatar', 600)->nullable();
			$table->date('birthdate')->nullable();
			$table->string('mobile_phone', 20)->nullable();
			$table->string('telephone', 20)->nullable();
			$table->integer('school_id')->unsigned()->nullable()->index();
			$table->char('grade_id', 6)->nullable()->index();
			$table->string('address', 200)->nullable();
			$table->integer('ward_id')->unsigned()->nullable()->index();
			$table->string('parent_name', 100)->nullable();
			$table->string('parent_phone', 20)->nullable();
			$table->text('description')->nullable();
			$table->datetime('email_verified_at')->nullable();
			$table->timestamps();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->softDeletes();
			$table->integer('deleted_by')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}