<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model 
{

    protected $table = 'choice';
    public $timestamps = false;
    // protected $guarded = array('id');
    protected $fillable = array('id', 'question_id', 'content', 'is_solution');

    public function question ()
    {
        return $this->belongsTo('App\Models\Question', 'question_id', 'id');
    }
}