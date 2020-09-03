<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model 
{

    protected $table = 'schools';
    public $timestamps = false;
    protected $guarded = array('id');
    protected $fillable = array('name', 'description', 'address');

    public function ward ()
    {
        return $this->belongsTo('App\Models\Ward', 'ward_id', 'id');
    }

    public function users ()
    {
        return $this->hasMany('App\Models\User', 'school_id', 'id');
    }

    public function classes ()
    {
        return $this->hasMany('App\Models\Class', 'school_id', 'id');
    }
}