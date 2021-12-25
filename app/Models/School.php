<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'school';
    public $timestamps = false;

    protected $guarded = array('id');
    protected $fillable = array('name', 'description', 'address');

    public function users ()
    {
        return $this->hasMany('App\Models\User', 'school_id', 'id');
    }
}
