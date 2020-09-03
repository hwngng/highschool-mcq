<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model 
{

    protected $table = 'questions';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = array('id', 'deleted_at');
    protected $fillable = array('content', 'topic_id', 'difficulty_id', 'solution', 'created_by', 'updated_by', 'deleted_by');

    public function topic ()
    {
        return $this->belongsTo('App\Models\Topic', 'topic_id', 'id');
    }

    public function difficulty ()
    {
        return $this->belongsTo('App\Models\Difficulty', 'difficulty_id', 'id');
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

    public function choices ()
    {
        return $this->hasMany('App\Models\Choice', 'question_id', 'id');
    }

    public function tests ()
    {
        return $this->belongsToMany('App\Models\Test', 'test_content', 'question_id', 'test_id')
                    ->withPivot('question_order', 'answer_order');
    }

    public function workHistories ()
    {
        return $this->belongsToMany('App\Models\WorkHistory', 'work_history_detail', 'question_id', 'work_history_id')
                    ->withPivot('choice_ids', 'last_updated');
    }
}