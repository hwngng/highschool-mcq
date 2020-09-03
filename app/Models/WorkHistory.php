<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model 
{

    protected $table = 'work_histories';
    public $timestamps = false;
    protected $guarded = array('id', 'started_at', 'ended_at', 'submitted_at');
    protected $fillable = array('user_id', 'test_id', 'no_of_correct', 'note');

    public function test ()
    {
        return $this->belongsTo('App\Models\Test', 'test_id', 'id');
    }

    public function user ()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function questions ()
    {
        return $this->belongsToMany('App\Models\Question', 'work_history_detail', 'work_history_id', 'question_id')
                    ->withPivot('choice_ids', 'last_updated');
    }
}