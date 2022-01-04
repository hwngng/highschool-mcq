<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model 
{

    protected $table = 'question';
    public $timestamps = false;

    use SoftDeletes;

    protected $dates = ['created_at', 'deleted_at'];
    protected $guarded = array('id', 'deleted_at');
    protected $fillable = array('content', 'subject_id', 'grade_id', 'solution', 'created_by', 'updated_by', 'deleted_by');

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function subject ()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }

    public function grade ()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
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