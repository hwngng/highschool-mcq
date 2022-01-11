<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lop extends Model
{

    protected $table = 'class';
    public $timestamps = false;

    use SoftDeletes;

    protected $dates = ['deleted_at', 'created_at'];
    protected $guarded = array('id');
    protected $fillable = array('name', 'description', 'grade_id', 'created_by');

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }

    public function tests()
    {
        return $this->belongsToMany('App\Models\Test', 'class_test', 'class_id', 'test_id')
            ->withPivot('created_at', 'created_by', 'start_at');
    }

    public function members()
    {
        return $this->belongsToMany('App\Models\User', 'class_member', 'class_id', 'user_id')
            ->withPivot('created_at', 'created_by');
    }
}
