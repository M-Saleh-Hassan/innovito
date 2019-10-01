<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Lesson extends Model
{
    protected $fillable = ['section_id', 'lesson_type_id', 'title', 'description', 'order', 'score'];
    protected $appends = ['status'];

    public function getStatusAttribute()
    {
        if(!Auth::check()) return 0;
        if(Auth::user()->hasRole('employee'))
        {
            return (int)!empty($this->users()->find(Auth::user()->id));
        }
        return 0;
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

    public function lessonType()
    {
        return $this->belongsTo('App\Models\LessonType');
    }

    public function content()
    {
        return $this->hasOne('App\Models\Content');
    }

    public function quiz()
    {
        return $this->hasOne('App\Models\Quiz');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_lessons', 'lesson_id', 'user_id')->withTimestamps();
    }

    public function getLessonView()
    {
        switch ($this->lesson_type_id) {
            case 1:
                $view = view('english.employee.course.partials.lesson.text')->with('lesson', $this)->render();
                break;
            case 2:
                $view = view('english.employee.course.partials.lesson.image')->with('lesson', $this)->render();
                break;
            case 3:
                $view = view('english.employee.course.partials.lesson.image')->with('lesson', $this)->render();
                break;
            case 4:
                $view = view('english.employee.course.partials.lesson.file')->with('lesson', $this)->render();
                break;
            case 5:
                $view = view('english.employee.course.partials.lesson.external')->with('lesson', $this)->render();
                break;
            case 6:
                $view = view('english.employee.course.partials.lesson.video')->with('lesson', $this)->render();
                break;
            case 7:
                $view = view('english.employee.course.partials.lesson.text')->with('lesson', $this)->render();
                break;
            case 8:
                $view = view('english.employee.course.partials.lesson.quiz')->with('lesson', $this)->render();
                break;
            default:
                $view = '';
                break;
        }

        return $view;
    }

}
