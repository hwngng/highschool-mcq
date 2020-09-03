<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model 
{

    protected $table = 'roles';
    public $timestamps = false;
    protected $guarded = array('id');
    protected $fillable = array('name', 'description');

    public function users ()
    {
        return $this->belongsToMany('App\Models\User', 'user_role', 'role_id', 'user_id');
    }

    public static $ROLE = ['admin' => '1', 'teacher' => '2', 'student' => '3'];
}