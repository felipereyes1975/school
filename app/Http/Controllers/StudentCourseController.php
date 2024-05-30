<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
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
        return view('evaluation.index');
    }

    /**
     * show all the alumns suscribed to courses that can ve valued
     * 
     */
    public function students()
    {
        try {
            //code...
            $result = Student::all();
            return view ('evaluation.students', ['students' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('evaluation.index')->with('status', $th->getMessage());
        }   
    }
    public function courses()
    {
        try {
            //code...
            $result = Course::all();
            return view ('evaluation.courses', ['students' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('evaluation.index')->with('status', $th->getMessage());
        }  
    }
    public function coursesearch(request $request)
    {
        try {
            //code...
            $query = "%".$request->search."%";
        $result = Course::where('desc', 'like', $query)
        ->orWhere('semester', '=', $request->search)
        ->get();
        return view ('evaluation.courses', ['students' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('evaluation.students')->with('status', $th->getMessage());
        }
    }
    /**
     * to search tru all students
     */
    public function search(request $request)
    {
        try {
            //code...
            $query = "%".$request->search."%";
        $result = Student::where('names', 'like', $query)
        ->orWhere('last_name', 'like', $query)
        ->orWhere('second_last_name', 'like', $query)
        ->orWhere('semester', '=', $request->search)
        ->get();
        return view ('evaluation.students', ['students' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('evaluation.students')->with('status', $th->getMessage());
        }
    }
    /**
     * 
     * Show the form to evaluate a Single students with id
     */
    public function single($id = null)
    {
        try {
            //code...
            $result = student_course::where('student_id','=', $id)
            ->join('students', 'student_courses.student_id', '=', 'students.id')
            ->join('courses', 'student_courses.course_id', '=', 'courses.id')
            ->select('student_courses.id as id','names', 'last_name', 'second_last_name', 'students.semester', 'desc', 'classroom_id', 'evaluation', 'approved')
            //->select('student_courses.id')
            ->get();
            //return json_encode($result);
            return view('evaluation.single', ['student' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('evaluation.students')->with('status', $th->getMessage());
        }
    }
    /**
     * Show the form to evaluate a whole class
     */
    public function grupal($id = null)
    {
        try {
            //code...
            $result = student_course::where('course_id','=', $id)
            ->join('students', 'student_courses.student_id', '=', 'students.id')
            ->join('courses', 'student_courses.course_id', '=', 'courses.id')
            ->select('student_courses.id','evaluation','approved', 'names', 'last_name', 'second_last_name', 'students.semester', 'course_id', 'desc', 'classroom_id')
            ->get();
            //return $result;
            return view('evaluation.grupal', ['class' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('evaluation.courses')->with('status', $th->getMessage());
        }
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
            $course = Course::find($id);
            $assistants = student_course::where('course_id', '=', $id)
            ->join('students', 'student_courses.student_id', '=', 'students.id')
            ->get();
            return view ('courses.assistants', ['assistants' => $assistants, 'course' => $course]);
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
    public function update(Request $request)
    {
        //
        try {
            //code...
        $notas = json_decode($request->notes);
        //return $notas;
        foreach($notas as $note)
        {
            $evaluation = student_course::find($note[0]);
            $evaluation->evaluation = $note[1];
            if ($note[1] > 7){
                $evaluation->approved = true;
            } else {
                $evaluation->approved = false;
            }
            $evaluation->save();
        }
        return to_route('evaluation.index')->with('status', __('student evaluated sucessfully!'));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('evaluation.index')->with('status', __($th->getMessage()));

        }
        
    }
    /**
     * Show a kardex of student
     * requires the student id
     */
    public function kardex($id = null)
    {
        try {
            //code...

        $result = student_course::where('student_id','=', $id)
        ->join('students', 'student_id', '=', 'students.id')
        ->join('courses', 'course_id', '=', 'courses.id')
        ->get();
        return view('evaluation.kardex', ['student' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('evaluation.index')->with('status', __($th->getMessage()));
        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student_course $student_course)
    {
        //
    }
}
