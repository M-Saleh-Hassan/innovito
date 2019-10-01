<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassroomSection extends Model
{
    protected $fillable = ['classroom_id', 'title', 'order'];

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom');
    }

    public function sessions()
    {
        return $this->hasMany('App\Models\Session');
    }

}
