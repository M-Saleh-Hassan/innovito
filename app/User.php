<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $appends = ['first_name', 'last_name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'department_id', 'branch_id', 'username', 'username_slug', 'bio', 'score', 'image',
         'website', 'birthday', 'phone', 'little_description', 'birthplace', 'occupation', 'header_image',
         'facebook', 'twitter', 'linkedin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFirstNameAttribute()
    {
        return explode(" ",$this->name, 2)[0];
    }

    public function getLastNameAttribute()
    {
        if(count(explode(" ",$this->name, 2)) ==  1) return '';
        return explode(" ",$this->name, 2)[1];
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }

    public function classrooms()
    {
        return $this->hasMany('App\Models\Classroom');
    }

    public function badges()
    {
        return $this->hasMany('App\Models\Badge');
    }

    public function enrolledCourses()
    {
        return $this->belongsToMany('App\Models\Course', 'course_user', 'user_id', 'course_id')->withTimestamps();
    }

    public function lessons()
    {
        return $this->belongsToMany('App\Models\Lesson', 'user_lessons', 'user_id', 'lesson_id')->withTimestamps();
    }

    public function sessions()
    {
        return $this->belongsToMany('App\Models\Session', 'session_attendances', 'user_id', 'session_id')->withTimestamps();
    }


}
