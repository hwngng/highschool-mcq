<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassTest extends Model 
{

    protected $table = 'class_tests';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = array('id', 'end_at');
    protected $fillable = array('class_id', 'test_id', 'test_matrix_id');

    public function class ()
    {
        return $this->belongsTo('App\Models\Class', 'class_id', 'id');
    }

    public function test ()
    {
        return $this->belongsTo('App\Models\Test', 'test_id', 'id');
    }

    public function testMatrix ()
    {
        return $this->belongsTo('App\Models\TestMatrix', 'test_matrix_id', 'id');
    }
}