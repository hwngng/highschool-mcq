<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestMatrix extends Model 
{

    protected $table = 'test_matrices';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = array('id');
    protected $fillable = array('title', 'description', 'duration', 'created_by', 'updated_by');

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

    public function tests ()
    {
        return $this->hasMany('App\Models\Test', 'test_matrix_id', 'id');
    }

    public function topics ()
    {
        return $this->belongsToMany('App\Models\Topic', 'test_matrix_content', 'test_matrix_id', 'topic_id')
                    ->withPivot('difficulty_id', 'quantity');
    }

    public function difficulties ()
    {
        return $this->belongsToMany('App\Models\Difficulty', 'test_matrix_content', 'test_matrix_id', 'difficulty_id')
                    ->withPivot('topic_id', 'quantity');
    }
}