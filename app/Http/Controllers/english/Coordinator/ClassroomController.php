<?php

namespace App\Http\Controllers\english\Coordinator;

use App\Events\NewClassroomCreatedEvent;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Auth;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $employees = User::whereHas('roles', function (Builder $query) {
            $query->where('name', 'employee');
        })->get();

        return view('english.coordinator.classroom.index')
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request['image'];
        $name =  date('mdYHis') . uniqid() . $file->getClientOriginalName();
        $name = str_replace(' ', '_', $name);
        $request->file('image')->move('uploads/classroom/images/', $name);

        $modifiedRequestData = $request->all();
        $modifiedRequestData['image'] = 'uploads/classroom/images/'.$name;
        $modifiedRequestData['user_id'] = Auth::user()->id;
        $modifiedRequestData['slug']   = str_slug($request->title, '-');

        $classroom = Classroom::create($modifiedRequestData);

        // Adding Employees to classroom
        if($request->has('employees')) event(new NewClassroomCreatedEvent($classroom, $request->employees));

        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'classroom Created Susscessfully!',
            ],
            'route' => route('en.coordinator.classrooms.edit', [$classroom->slug])
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        $categories = Category::all();

        return view('english.coordinator.classroom.edit')
        ->with('classroom', $classroom)
        ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        if($request->file('image'))
        {
            unlink($classroom->image);
            $file = $request['image'];
            $name =  date('mdYHis') . uniqid() . $file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            $request->file('image')->move('uploads/classroom/images/', $name);
        }

        $modifiedRequestData = $request->all();
        if($request->file('image')) $modifiedRequestData['image'] = 'uploads/classroom/images/'.$name;
        $modifiedRequestData['user_id'] = Auth::user()->id;
        $modifiedRequestData['slug']   = str_slug($request->title, '-');

        $classroom = Classroom::find($classroom->id)->update($modifiedRequestData);

        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'classroom Updated Susscessfully!',
            ],
            'route' => route('en.coordinator.classrooms.edit', [$modifiedRequestData['slug']])
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        unlink($classroom->image);
        $classroom->delete();
        return response()->json([
            'swal' => [
                'status' => 1,
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Classroom Deleted Susscessfully!',
            ],
            'route' => route('en.coordinator.classrooms.index')
        ]);

    }
}
