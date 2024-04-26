<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\User;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$student = Student::all();
        // dd($student);
        //return view ('students.index', ['students' => $student]);
        $teachers = Teacher::all();
        return view ('teachers.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('teachers.create');
    }

    public function view($id)
    {
        $teacherSelect = Teacher::find($id);
        $created_by = User::find($teacherSelect->created_by);
        $updated_by = User::find($teacherSelect->updated_by);
        //echo $studentSelect;
        return view('teachers.view', ['teacher' => $teacherSelect,
        'created_by' => $created_by,
        'updated_by' => $updated_by]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            Teacher::create([
                'name' => $request->get('name'),
                'last_name' => $request->get('last_name'),
                'second_last_name' => $request->get('second_last_name'),
                'created_by' => auth()->id()
            ]);
            return to_route('teachers.index')->with('status', __('New teacher added'));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('teachers.index')->with('status', __($th->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
