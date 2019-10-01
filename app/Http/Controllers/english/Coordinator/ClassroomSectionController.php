<?php

namespace App\Http\Controllers\english\Coordinator;

use App\Models\ClassroomSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassroomSectionController extends Controller
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
        $section = ClassroomSection::create($request->all());

        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Section Created Susscessfully!',
            ],
            // 'curriculum' => view('english.coordinator.classroom.partials.curriculum')->with('course', $section->course)->render(),
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassroomSection  $classroomSection
     * @return \Illuminate\Http\Response
     */
    public function show(ClassroomSection $classroomSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassroomSection  $classroomSection
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassroomSection $classroomSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassroomSection  $classroomSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassroomSection $classroomsection)
    {
        // rearrangeOrders($request->order, $section, 'Section', 'course');

        ClassroomSection::find($classroomsection->id)->update($request->all());
        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Section Updated Susscessfully!',
            ],
            // 'curriculum' => view('english.coordinator.course.partials.curriculum')->with('course', $section->course)->render(),
            'section_id' => $classroomsection->id,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassroomSection  $classroomSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassroomSection $classroomsection)
    {
        $section_id = $classroomsection->id;
        $classroomsection->delete();

        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Section Deleted Susscessfully!',
            ],
            'section_id' => $section_id
        ]);

    }
}
