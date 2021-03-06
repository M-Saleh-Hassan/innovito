<?php

namespace App\Http\Controllers\admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        return view('admin.departments.index')
        ->with('departments', $departments)
        ->with('counter', 1);

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
        $validation = Validator::make($request->all(),
        [
            'title' => 'required|max:51|min:3',
        ]);

        if($validation->passes())
        {
            $department= Department::create($request->all());

            return response()->json([
                'message'        => 'department saved Successfully',
                'errors'         => '',
                'department_id'    => $department->id,
                'department_title'    => $department->title,
                'department_link_edit'=> route('admin.departments.edit', [$department->id]),
            ]);
        }
        else
        {
            return response()->json([
                'message' => '',
                'errors'  => $validation->errors()->all(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $id of Department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id of Department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $current = Department::find($id);

        return view('admin.departments.edit')
        ->with('current', $current)
        ->with('counter', 1);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id of Department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),
        [
            'title' => 'required|max:51|min:3',
        ]);

        if($validation->passes())
        {

            $department= Department::find($id)->update($request->all());

            return response()->json([
                'message'        => 'department saved Successfully',
                'errors'         => '',
            ]);
        }
        else
        {
            return response()->json([
                'message' => '',
                'errors'  => $validation->errors()->all(),
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id of Department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department= Department::find($id);
        $department->delete();
        return response()->json(array('id' => $id), 200);
    }
}
