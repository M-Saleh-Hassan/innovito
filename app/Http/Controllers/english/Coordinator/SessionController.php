<?php

namespace App\Http\Controllers\english\Coordinator;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassroomSection;
use App\User;

class SessionController extends Controller
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
        $session = Session::create($request->all());

        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Session Created Susscessfully!',
            ],
            // 'curriculum' => view('english.coordinator.classroom.partials.curriculum')->with('course', $section->course)->render(),
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        // rearrangeOrders($request->order, $section, 'Section', 'course');

        Session::find($session->id)->update($request->all());
        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Session Updated Susscessfully!',
            ],
            // 'curriculum' => view('english.coordinator.course.partials.curriculum')->with('course', $section->course)->render(),
            'session_id' => $session->id,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        $session_id = $session->id;
        $session->delete();

        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Session Deleted Susscessfully!',
            ],
            'session_id' => $session_id
        ]);

    }

    public function attend(Request $request)
    {
        $classroom_id = Session::find($request->session_id)->section->classroom->id;
        if(User::find($request->user_id)->sessions()->where('session_id', $request->session_id)->first())
        {
            User::find($request->user_id)->sessions()->detach($request->session_id);
            return response()->json([
                'swal' => [
                    'status' => 1,
                    'type' => 'success',
                    'title' => 'Success',
                    'message' => 'Session Unattended Susscessfully!',
                ],
            ]);

        }
        User::find($request->user_id)->sessions()->attach($request->session_id, ['classroom_id' => $classroom_id]);
            return response()->json([
                'swal' => [
                    'status' => 1,
                    'type' => 'success',
                    'title' => 'Success',
                    'message' => 'Session Attended Susscessfully!',
                ],
            ]);
    }
}
