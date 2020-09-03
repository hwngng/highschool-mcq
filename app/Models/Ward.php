<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model 
{

    protected $table = 'wards';
    public $timestamps = false;
    protected $guarded = array('id');
    protected $fillable = array('name', 'district_id');

    public function province ()
    {
        return $this->belongsTo('App\Models\Province', 'district_id', 'id');
    }

    public function schools ()
    {
        return $this->hasMany('App\Models\School', 'ward_id', 'id');
    }

    public function users ()
    {
        return $this->hasMany('App\Models\User', 'ward_id', 'id');
    }
}