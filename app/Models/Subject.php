<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model 
{

    protected $table = 'subjects';
    public $timestamps = false;
    protected $guarded = array('id');
    protected $fillable = array('name', 'description', 'grade_id');

    public function grade ()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }

    public function chapters ()
    {
        return $this->hasMany('App\Models\Chapter', 'subject_id', 'id');
    }
}