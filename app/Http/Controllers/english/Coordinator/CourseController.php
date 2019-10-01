<?php

namespace App\Http\Controllers\english\Coordinator;

use App\Events\NewCourseCreatedEvent;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CourseStoreRequest;
use App\Http\Requests\Course\CourseUpdateRequest;
use App\Models\Category;
use App\Models\CompletionCriteria;
use App\Models\CourseType;
use App\Models\Course;
use App\Models\LessonType;
use App\User;
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
        $course_types = CourseType::all();
        $completion_criterias = CompletionCriteria::all();
        $categories = Category::all();
        $employees = User::whereHas('roles', function (Builder $query) {
            $query->where('name', 'employee');
        })->get();

        return view('english.coordinator.course.index')
        ->with('course_types', $course_types)
        ->with('completion_criterias', $completion_criterias)
        ->with('categories', $categories)
        ->with('employees', $employees);
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
     * @param  \App\Http\Requests\Course\CourseStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStoreRequest $request)
    {
        $file = $request['image'];
        $name =  date('mdYHis') . uniqid() . $file->getClientOriginalName();
        $name = str_replace(' ', '_', $name);
        $request->file('image')->move('uploads/course/images/', $name);

        $modifiedRequestData = $request->all();
        $modifiedRequestData['image'] = 'uploads/course/images/'.$name;
        $modifiedRequestData['user_id'] = Auth::user()->id;
        $modifiedRequestData['slug']   = str_slug($request->title, '-');

        $course = Course::create($modifiedRequestData);

        // Adding Employees to course
        if($request->has('employees')) event(new NewCourseCreatedEvent($course, $request->employees));

        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Course Created Susscessfully!',
            ],
            'route' => route('en.coordinator.courses.edit', [$course->slug])
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('english.coordinator.course.show')
        ->with('course', $course);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $course_types = CourseType::all();
        $completion_criterias = CompletionCriteria::all();
        $categories = Category::all();
        $lesson_types = LessonType::where('title', '<>', 'quiz')->get();

        return view('english.coordinator.course.edit')
        ->with('course', $course)
        ->with('course_types', $course_types)
        ->with('completion_criterias', $completion_criterias)
        ->with('categories', $categories)
        ->with('lesson_types', $lesson_types);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Https\Requests\Course\CourseUpdateRequest  $request
     * @param  Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdateRequest $request,Course $course)
    {
        if($request->file('image'))
        {
            unlink($course->image);
            $file = $request['image'];
            $name =  date('mdYHis') . uniqid() . $file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            $request->file('image')->move('uploads/course/images/', $name);
        }

        $modifiedRequestData = $request->all();
        if($request->file('image')) $modifiedRequestData['image'] = 'uploads/course/images/'.$name;
        $modifiedRequestData['user_id'] = Auth::user()->id;
        $modifiedRequestData['slug']   = str_slug($request->title, '-');

        $course = Course::find($course->id)->update($modifiedRequestData);

        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Course Updated Susscessfully!',
            ],
            'route' => route('en.coordinator.courses.edit', [$modifiedRequestData['slug']])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        unlink($course->image);
        $course->delete();
        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Course Deleted Susscessfully!',
            ],
            'route' => route('en.coordinator.courses.index')
        ]);
    }

    public function filter(Request $request)
    {
        $category_id = $request->category_id;
        if($category_id != "all")
            $courses = Course::where('category_id', $category_id)->where('user_id', $request->user()->id)->orderBy('title', $request->order_type)->get();
        else
            $courses = Course::where('user_id', $request->user()->id)->orderBy('title', $request->order_type)->get();

        return response()->json([
            'courses' => view('english.coordinator.course.partials.course.courses_loops')->with('courses', $courses)->render()
        ]);

    }
}
