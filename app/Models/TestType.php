<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestType extends Model 
{

    protected $table = 'test_type';
    public $timestamps = false;
    protected $guarded = array('id');
    protected $fillable = array('name', 'description');

    public function testType ()
    {
        return $this->hasMany('App\Models\Test', 'test_type_id', 'id');
    }

    public static $TESTTYPE = ['private' => '0', 'public' => '1'];
}