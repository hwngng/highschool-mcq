<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{

    protected $table = 'test';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $guarded = array('id');
    protected $fillable = array('test_code', 'grade_id', 'subject_id', 'name', 'description', 'no_of_questions', 'test_type_id', 'created_by', 'updated_by', 'deleted_by');

    public function grade ()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }

    public function subject ()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }

    public function testType ()
    {
        return $this->belongsTo('App\Models\TestType', 'test_type_id', 'id');
    }

    public function questions ()
    {
        return $this->belongsToMany('App\Models\Question', 'test_content', 'test_id', 'question_id')
                    ->withPivot('question_order', 'answer_order');
    }

    public function classes ()
    {
        return $this->belongsToMany('App\Models\Class', 'class_test', 'test_id', 'class_id')
                    ->withPivot('start_at', 'created_at', 'created_by');
    }

    public function workHistories ()
    {
        return $this->hasMany('App\Models\WorkHistory', 'test_id', 'id');
    }

    public function createdBy ()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
