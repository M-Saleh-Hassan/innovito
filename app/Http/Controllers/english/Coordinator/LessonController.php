<?php

namespace App\Http\Controllers\english\Coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Lesson\LessonStroreRequest;
use App\Http\Requests\Lesson\LessonUpdateRequest;
use App\Models\Content;
use App\Models\Lesson;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Lesson\LessonStroreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonStroreRequest $request)
    {
        $lesson = Lesson::create($request->all());

        $modifiedRequestData = $request->all();
        if($request->has('image'))
        {
            $file = $request['image'];
            $name =  date('mdYHis') . uniqid() . $file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            $request->file('image')->move('uploads/course/lessons/uploads/', $name);
            $modifiedRequestData['image'] = 'uploads/course/lessons/uploads/'.$name;
        }

        if($request->has('localvideo_link'))
        {
            $file = $request['localvideo_link'];
            $name =  date('mdYHis') . uniqid() . $file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            $request->file('localvideo_link')->move('uploads/course/lessons/uploads/', $name);
            $modifiedRequestData['video_filename'] = $file->getClientOriginalName();
            $modifiedRequestData['localvideo_link'] = 'uploads/course/lessons/uploads/'.$name;
        }

        $modifiedRequestData['lesson_id'] = $lesson->id;
        $content = Content::create($modifiedRequestData);

        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Lesson Created Susscessfully!',
            ],
            'curriculum' => view('english.coordinator.course.partials.curriculum')->with('course', $lesson->section->course)->render(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Lesson\LessonUpdateRequest  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(LessonUpdateRequest $request, Lesson $lesson)
    {
        rearrangeOrders($request->order, $lesson, 'Lesson', 'section');

        Lesson::find($lesson->id)->update($request->all());

        $modifiedRequestData = $request->all();
        if($request->has('image'))
        {
            unlink($lesson->content->image);
            $file = $request['image'];
            $name =  date('mdYHis') . uniqid() . $file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            $request->file('image')->move('uploads/course/lessons/uploads/', $name);
            $modifiedRequestData['image'] = 'uploads/course/lessons/uploads/'.$name;
        }

        if($request->has('localvideo_link'))
        {
            unlink($lesson->content->localvideo_link);
            $file = $request['localvideo_link'];
            $name =  date('mdYHis') . uniqid() . $file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            $request->file('localvideo_link')->move('uploads/course/lessons/uploads/', $name);
            $modifiedRequestData['video_filename'] = $file->getClientOriginalName();
            $modifiedRequestData['localvideo_link'] = 'uploads/course/lessons/uploads/'.$name;
        }

        Content::find($lesson->content->id)->update($modifiedRequestData);
        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Lesson Updated Susscessfully!',
            ],
            'curriculum' => view('english.coordinator.course.partials.curriculum')->with('course', $lesson->section->course)->render(),
            'lesson_id' => $lesson->id,
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        if($lesson->content)
        {
            if($lesson->content->image)unlink($lesson->content->image);
            if($lesson->content->localvideo_link)unlink($lesson->content->localvideo_link);
        }

        $lesson_id = $lesson->id;
        $course = $lesson->section->course;
        $lesson->delete();

        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Lesson Deleted Susscessfully!',
            ],
            'lesson_id' => $lesson_id,
            'curriculum' => view('english.coordinator.course.partials.curriculum')->with('course', $course)->render(),
        ]);

    }
}
