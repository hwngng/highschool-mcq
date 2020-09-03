<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lop extends Model 
{

    protected $table = 'classes';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = array('id');
    protected $fillable = array('name', 'grade_id', 'school_id', 'created_by');

    public function grade ()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }

    public function school ()
    {
        return $this->belongsTo('App\Models\School', 'school_id', 'id');
    }

    public function createdBy ()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function classTests ()
    {
        return $this->hasMany('App\Models\ClassTest', 'class_id', 'id');
    }

    public function members ()
    {
        return $this->belongsToMany('App\Models\User', 'class_members', 'class_id', 'user_id')
                    ->withTimestamps();
    }
}