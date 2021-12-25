<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model 
{

    protected $table = 'subject';
    public $timestamps = false;
    protected $guarded = array('id');
    protected $fillable = array('name', 'description');

    public function questions ()
    {
        return $this->hasMany('App\Models\Question', 'grade_id', 'id');
    }

    public function tests ()
    {
        return $this->hasMany('App\Models\Test', 'grade_id', 'id');
    }
}