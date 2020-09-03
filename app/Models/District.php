<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model 
{

    protected $table = 'districts';
    public $timestamps = false;
    protected $guarded = array('id');
    protected $fillable = array('name', 'province_id');

    public function province ()
    {
        return $this->belongsTo('App\Models\Province', 'province_id', 'id');
    }
}