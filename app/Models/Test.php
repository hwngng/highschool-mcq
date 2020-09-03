<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model 
{

    protected $table = 'test';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = array('id', 'code');
    protected $fillable = array('origin', 'test_matrix_id', 'grade_id', 'name', 'description', 'no_of_questions', 'created_by', 'updated_by', 'deleted_by');

    public function origin ()
    {
        return $this->belongsTo('App\Models\Test', 'origin', 'id');
    }

    public function testMatrix ()
    {
        return $this->belongsTo('App\Models\TestMatrix', 'test_matrix_id', 'id');
    }

    public function grade ()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }

    public function testType ()
    {
        return $this->belongsTo('App\Models\TestType', 'test_type_id', 'id');
    }

    public function createdBy ()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function updatedBy ()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }

    public function deletedBy ()
    {
        return $this->belongsTo('App\Models\User', 'deleted_by', 'id');
    }

    public function questions ()
    {
        return $this->belongsToMany('App\Models\Question', 'test_content', 'test_id', 'question_id')
                    ->withPivot('question_order', 'answer_order');
    }

    public function classTests ()
    {
        return $this->hasMany('App\Models\ClassTest', 'test_id', 'id');
    }

    public function workHistories ()
    {
        return $this->hasMany('App\Models\WorkHistory', 'test_id', 'id');
    }
}