<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model 
{

    protected $table = 'grade';
    public $timestamps = false;
    protected $guarded = array('id');
    protected $fillable = array('description');

    public function tests ()
    {
        return $this->hasMany('App\Models\Test', 'grade_id', 'id');
    }

    public function questions ()
    {
        return $this->hasMany('App\Models\Question', 'grade_id', 'id');
    }

    public function classes ()
    {
        return $this->hasMany('App\Models\Class', 'grade_id', 'id');
    }

    public function users ()
    {
        return $this->hasMany('App\Models\User', 'grade_id', 'id');
    }
}