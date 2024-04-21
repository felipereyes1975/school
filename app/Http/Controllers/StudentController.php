<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $student = Student::all();
        // dd($student);
        return view ('students.index', ['students' => $student]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            Student::create([
                'names' => $request->get('name'),
                'last_name' => $request->get('last_name'),
                'second_last_name' => $request->get('second_last_name'),
                'created_by' => auth()->id()
            ]);
            return to_route('students.index')->with('status', __('New student added'));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('students.index')->with('status', __('Error on sending data'));
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        
    }
    public function view($id)
    {
        $studentSelect = Student::find($id);
        $created_by = User::find($studentSelect->created_by);
        $updated_by = User::find($studentSelect->updated_by);
        //echo $studentSelect;
        return view('students.view', ['student' => $studentSelect,
        'created_by' => $created_by,
        'updated_by' => $updated_by]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
