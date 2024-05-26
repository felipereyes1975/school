<?php

namespace App\Http\Controllers;

use App\Models\student_course;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 'student_id',
        'course_id',
        'group',
        'created_by',
        'updated_by'
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $courses = json_decode($request->courses);
            foreach($courses as $course){
                student_course::create([
                    'student_id' => $request->student,
                    'course_id' => $course,
                    'created_by' => auth()->id()
                ]);
            }
            return to_route('students.index')->with('status', __('suscribed to new courses!'));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('students.index')->with('status', __($th->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id, student_course $student_course)
    {
        //
        try {
            //code...
            $assistants = student_course::where('course_id', '=', $id)
            ->join('students', 'student_courses.student_id', '=', 'students.id')
            ->get();
            return view ('courses.assistants', ['assistants' => $assistants]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('courses.index')->with('status', __($th->getMessage()));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student_course $student_course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student_course $student_course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student_course $student_course)
    {
        //
    }
}
