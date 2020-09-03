<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use Notifiable;

    protected $table = 'users';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = array('id', 'username', 'password', 'remember_token', 'email_verified_at');
    protected $fillable = array('email', 'first_name', 'last_name', 'avatar', 'birthdate', 'mobile_phone', 'telephone', 'school_id', 'grade_id', 'address', 'district_id', 'parent_name', 'parent_phone', 'description', 'created_by', 'updated_by', 'deleted_by');
    protected $hidden = array('password', 'remember_token');

    public function getAuthPassword()
    {
      return $this->password;
    }

    public function school ()
    {
        return $this->belongsTo('App\Models\School', 'school_id', 'id');
    }

    public function grade ()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }

    public function ward ()
    {
        return $this->belongsTo('App\Models\Ward', 'ward_id', 'id');
    }

    public function createdBy ()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function updatedBy ()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }

    public function deletedBy ()
    {
        return $this->belongsTo('App\Models\User', 'deleted_by', 'id');
    }

    public function classes ()
    {
        return $this->belongsToMany('App\Models\Class', 'class_members', 'user_id', 'class_id')
                    ->withTimestamps();
    }

    public function workHistories ()
    {
        return $this->hasMany('App\Models\WorkHistory', 'user_id', 'id');
    }

    public function roles ()
     {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }


    public function hasARoleIn ($requiredRoles)
    {
        foreach ($this->roles as $userRole)
        {
            foreach ($requiredRoles as $reqRole)
            {
                if ($userRole->id == Role::$ROLE[$reqRole])
                {
                    return true;
                }
            }
        }
        return false;
    }

    public function hasRole ($requiredRole)
    {
        foreach ($this->roles as $userRole)
        {
            if ($userRole->id == Role::$ROLE[$requiredRole])
            {
                return true;
            }
        }
        return false;
    }
}