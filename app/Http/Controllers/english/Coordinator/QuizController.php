<?php

namespace App\Http\Controllers\english\Coordinator;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;

class QuizController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lesson = Lesson::create($request->all());
        $modifiedRequestData = $request->all();
        $modifiedRequestData['lesson_id'] = $lesson->id;
        $modifiedRequestData['quiz_title'] = $request->title;
        Quiz::create($modifiedRequestData);

        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Quiz Created Susscessfully!',
            ],
            'curriculum' => view('english.coordinator.course.partials.curriculum')->with('course', $lesson->section->course)->render(),
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $quiz)
    {
        rearrangeOrders($request->order, $quiz, 'Lesson', 'section');

        Lesson::find($quiz->id)->update($request->all());

        $modifiedRequestData = $request->only(['description', 'passing_score', 'time_limit', 'due_date']);
        $modifiedRequestData['quiz_title'] = $request->title;
        Quiz::where('lesson_id', $quiz->id)->update($modifiedRequestData);

        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Quiz Updated Susscessfully!',
            ],
            'curriculum' => view('english.coordinator.course.partials.curriculum')->with('course', $quiz->section->course)->render(),
            'lesson_id' => $quiz->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
