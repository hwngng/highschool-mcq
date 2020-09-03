<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('districts', function(Blueprint $table) {
			$table->foreign('province_id')->references('id')->on('provinces')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('wards', function(Blueprint $table) {
			$table->foreign('district_id')->references('id')->on('districts')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('schools', function(Blueprint $table) {
			$table->foreign('ward_id')->references('id')->on('wards')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('chapters', function(Blueprint $table) {
			$table->foreign('subject_id')->references('id')->on('subjects')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('topics', function(Blueprint $table) {
			$table->foreign('chapter_id')->references('id')->on('chapters')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('school_id')->references('id')->on('schools')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('grade_id')->references('id')->on('grades')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('subjects', function(Blueprint $table) {
			$table->foreign('grade_id')->references('id')->on('grades')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('ward_id')->references('id')->on('wards')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('created_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('updated_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('deleted_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('topic_id')->references('id')->on('topics')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('difficulty_id')->references('id')->on('difficulties')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('created_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('updated_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('deleted_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('choices', function(Blueprint $table) {
			$table->foreign('question_id')->references('id')->on('questions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_role', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_role', function(Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('roles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('test_matrices', function(Blueprint $table) {
			$table->foreign('created_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('test_matrices', function(Blueprint $table) {
			$table->foreign('updated_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('test_matrices', function(Blueprint $table) {
			$table->foreign('deleted_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('test_matrix_content', function(Blueprint $table) {
			$table->foreign('test_matrix_id')->references('id')->on('test_matrices')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('test_matrix_content', function(Blueprint $table) {
			$table->foreign('topic_id')->references('id')->on('topics')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('test_matrix_content', function(Blueprint $table) {
			$table->foreign('difficulty_id')->references('id')->on('difficulties')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->foreign('origin')->references('id')->on('tests')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->foreign('test_matrix_id')->references('id')->on('test_matrices')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->foreign('grade_id')->references('id')->on('grades')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->foreign('test_type_id')->references('id')->on('test_types')
						->onDelete('set null')
						->onUpdate('restrict');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->foreign('created_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->foreign('updated_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->foreign('deleted_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('test_content', function(Blueprint $table) {
			$table->foreign('test_id')->references('id')->on('tests')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('test_content', function(Blueprint $table) {
			$table->foreign('question_id')->references('id')->on('questions')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->foreign('grade_id')->references('id')->on('grades')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->foreign('school_id')->references('id')->on('schools')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->foreign('created_by')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('class_members', function(Blueprint $table) {
			$table->foreign('class_id')->references('id')->on('classes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('class_members', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('class_tests', function(Blueprint $table) {
			$table->foreign('class_id')->references('id')->on('classes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('class_tests', function(Blueprint $table) {
			$table->foreign('test_id')->references('id')->on('tests')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('class_tests', function(Blueprint $table) {
			$table->foreign('test_matrix_id')->references('id')->on('test_matrices')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('work_histories', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('work_histories', function(Blueprint $table) {
			$table->foreign('test_id')->references('id')->on('tests')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('work_history_detail', function(Blueprint $table) {
			$table->foreign('work_history_id')->references('id')->on('work_histories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('work_history_detail', function(Blueprint $table) {
			$table->foreign('question_id')->references('id')->on('questions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('districts', function(Blueprint $table) {
			$table->dropForeign('districts_province_id_foreign');
		});
		Schema::table('wards', function(Blueprint $table) {
			$table->dropForeign('wards_district_id_foreign');
		});
		Schema::table('schools', function(Blueprint $table) {
			$table->dropForeign('schools_ward_id_foreign');
		});
		Schema::table('chapters', function(Blueprint $table) {
			$table->dropForeign('chapters_subject_id_foreign');
		});
		Schema::table('topics', function(Blueprint $table) {
			$table->dropForeign('topics_chapter_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_school_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_grade_id_foreign');
		});
		Schema::table('subjects', function(Blueprint $table) {
			$table->dropForeign('subjects_grade_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_ward_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_created_by_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_updated_by_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_deleted_by_foreign');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_topic_id_foreign');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_difficulty_id_foreign');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_created_by_foreign');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_updated_by_foreign');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_deleted_by_foreign');
		});
		Schema::table('choices', function(Blueprint $table) {
			$table->dropForeign('choices_question_id_foreign');
		});
		Schema::table('user_role', function(Blueprint $table) {
			$table->dropForeign('user_role_user_id_foreign');
		});
		Schema::table('user_role', function(Blueprint $table) {
			$table->dropForeign('user_role_role_id_foreign');
		});
		Schema::table('test_matrices', function(Blueprint $table) {
			$table->dropForeign('test_matrices_created_by_foreign');
		});
		Schema::table('test_matrices', function(Blueprint $table) {
			$table->dropForeign('test_matrices_updated_by_foreign');
		});
		Schema::table('test_matrices', function(Blueprint $table) {
			$table->dropForeign('test_matrices_deleted_by_foreign');
		});
		Schema::table('test_matrix_content', function(Blueprint $table) {
			$table->dropForeign('test_matrix_content_test_matrix_id_foreign');
		});
		Schema::table('test_matrix_content', function(Blueprint $table) {
			$table->dropForeign('test_matrix_content_topic_id_foreign');
		});
		Schema::table('test_matrix_content', function(Blueprint $table) {
			$table->dropForeign('test_matrix_content_difficulty_id_foreign');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->dropForeign('test_origin_foreign');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->dropForeign('test_test_matrix_id_foreign');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->dropForeign('test_grade_id_foreign');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->dropForeign('test_test_type_id_foreign');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->dropForeign('test_created_by_foreign');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->dropForeign('test_updated_by_foreign');
		});
		Schema::table('tests', function(Blueprint $table) {
			$table->dropForeign('test_deleted_by_foreign');
		});
		Schema::table('test_content', function(Blueprint $table) {
			$table->dropForeign('test_content_test_id_foreign');
		});
		Schema::table('test_content', function(Blueprint $table) {
			$table->dropForeign('test_content_question_id_foreign');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->dropForeign('classes_grade_id_foreign');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->dropForeign('classes_school_id_foreign');
		});
		Schema::table('classes', function(Blueprint $table) {
			$table->dropForeign('classes_created_by_foreign');
		});
		Schema::table('class_members', function(Blueprint $table) {
			$table->dropForeign('class_members_class_id_foreign');
		});
		Schema::table('class_members', function(Blueprint $table) {
			$table->dropForeign('class_members_user_id_foreign');
		});
		Schema::table('class_tests', function(Blueprint $table) {
			$table->dropForeign('class_tests_class_id_foreign');
		});
		Schema::table('class_tests', function(Blueprint $table) {
			$table->dropForeign('class_tests_test_id_foreign');
		});
		Schema::table('class_tests', function(Blueprint $table) {
			$table->dropForeign('class_tests_test_matrix_id_foreign');
		});
		Schema::table('work_histories', function(Blueprint $table) {
			$table->dropForeign('work_histories_user_id_foreign');
		});
		Schema::table('work_histories', function(Blueprint $table) {
			$table->dropForeign('work_histories_test_id_foreign');
		});
		Schema::table('work_history_detail', function(Blueprint $table) {
			$table->dropForeign('work_history_detail_work_history_id_foreign');
		});
		Schema::table('work_history_detail', function(Blueprint $table) {
			$table->dropForeign('work_history_detail_question_id_foreign');
		});
	}
}