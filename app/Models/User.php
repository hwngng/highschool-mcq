<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use Notifiable;

    protected $table = 'user';
    public $timestamps = false;

    use SoftDeletes;

    protected $dates = ['deleted_at', 'created_at'];
    protected $guarded = array('id', 'username', 'password', 'remember_token', 'email_verified_at');
    protected $fillable = array('email', 'first_name', 'last_name', 'avatar', 'birthdate', 'mobile_phone', 'telephone', 'grade_id', 'address', 'description', 'created_by', 'deleted_by');
    protected $hidden = array('password', 'remember_token');

    public function getAuthPassword()
    {
      return $this->password;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function grade ()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }

    public function school ()
    {
        return $this->belongsTo('App\Models\School', 'school_id', 'id');
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