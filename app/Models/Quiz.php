<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['lesson_id', 'quiz_title', 'description', 'passing_score', 'time_limit', 'due_date'];
}
