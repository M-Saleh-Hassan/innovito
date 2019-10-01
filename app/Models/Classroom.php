<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'location', 'image', 'certificate', 'description', 'published', 'approved', 'expired_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'classroom_user', 'classroom_id', 'user_id')->withTimestamps();
    }

    public function coordinator()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function classroomSections()
    {
        return $this->hasMany('App\Models\ClassroomSection');
    }

}
