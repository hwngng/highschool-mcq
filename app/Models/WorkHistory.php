<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model 
{
    protected $table = 'work_history';
    public $timestamps = false;
    protected $guarded = array('id', 'started_at', 'ended_at', 'submitted_at');
    protected $fillable = array('user_id', 'test_id', 'test_code', 'no_of_correct', 'note');

    public function scopeTest ($query)
    {
        return $query->join('test', function ($join)
        {
            $join->on('test.id', '=', 'work_history.test_id');
            $join->on('test.code', '=', 'work_history.test_code');
        });
    }

    public function user ()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function questions ()
    {
        return $this->belongsToMany('App\Models\Question', 'work_history_detail', 'work_history_id', 'question_id')
                    ->withPivot('choice_ids', 'updated_at');
    }
}