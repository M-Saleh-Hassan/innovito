<?php

namespace App\Http\Controllers\english\Employee;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lesson;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('english.employee.course.index')
        ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('english.employee.course.show')
        ->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function filter(Request $request)
    {
        $category_id = $request->category_id;
        if($category_id != "all")
            $courses = Auth::user()->enrolledCourses()->where('category_id', $category_id)->orderBy('title', $request->order_type)->get();
        else
            $courses = Auth::user()->enrolledCourses()->orderBy('title', $request->order_type)->get();

        return response()->json([
            'courses' => view('english.employee.course.partials.course.courses_loops')->with('courses', $courses)->render()
        ]);

    }

    public function content(Course $course)
    {
        $lesson = Lesson::find($course->getLastSeenLessonId());

        return view('english.employee.course.content')
        ->with('course', $course)
        ->with('lesson_text', $lesson->getLessonView());

    }
}
