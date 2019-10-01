<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = ['classroom_section_id', 'title', 'from', 'to', 'session_date', 'order', 'score'];
    // protected $dates = ['from', 'to', 'session_date'];

    public function section()
    {
        return $this->belongsTo('App\Models\ClassroomSection', 'classroom_section_id');
    }

}
