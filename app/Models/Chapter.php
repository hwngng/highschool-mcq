<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model 
{

    protected $table = 'chapters';
    public $timestamps = false;
    protected $guarded = array('id');
    protected $fillable = array('subject_id', 'order_no', 'name', 'description');

    public function subject ()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }

    public function topics ()
    {
        return $this->hasMany('App\Models\Topic', 'chapter_id', 'id');
    }
}