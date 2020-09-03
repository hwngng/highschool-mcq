<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model 
{

    protected $table = 'difficulties';
    public $timestamps = false;
    protected $guarded = array('id');
    protected $fillable = array('name', 'description');

    public function questions ()
    {
        return $this->hasMany('App\Models\Question', 'question_id', 'id');
    }

    public function topics ()
    {
        return $this->belongsToMany('App\Models\Topic', 'test_matrix_content', 'difficulty_id', 'topic_id')
                    ->withPivot('test_matrix_id', 'quantity');
    }

    public function testMatrices ()
    {
        return $this->belongsToMany('App\Models\TestMatrix', 'test_matrix_content', 'difficulty_id', 'test_matrix_id')
                    ->withPivot('topic_id', 'quantity');
    }
}