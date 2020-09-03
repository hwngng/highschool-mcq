<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model 
{

    protected $table = 'grades';
    public $timestamps = false;
    protected $guarded = array('id');

    public function subjects ()
    {
        return $this->hasMany('App\Models\Subject', 'grade_id', 'id');
    }

    public function tests ()
    {
        return $this->hasMany('App\Models\Test', 'grade_id', 'id');
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