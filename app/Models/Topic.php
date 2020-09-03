<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model 
{

    protected $table = 'topics';
    public $timestamps = false;
    protected $guarded = array('id');
    protected $fillable = array('chapter_id', 'order_no', 'name', 'description');

    public function chapter ()
    {
        return $this->belongsTo('App\Models\Chapter', 'chapter_id', 'id');
    }

    public function testMatrices ()
    {
        return $this->belongsToMany('App\Models\TestMatrix', 'test_matrix_content', 'topic_id', 'test_matrix_id')
                    ->withPivot('difficulty_id', 'quantity');
    }

    public function difficulties ()
    {
        return $this->belongsToMany('App\Models\Difficulty', 'test_matrix_content', 'topic_id', 'difficulty_id')
                    ->withPivot('test_matrix_id', 'quantity');
    }

    public function questions ()
    {
        return $this->hasMany('App\Models\Question', 'topic_id', 'id');
    }
}