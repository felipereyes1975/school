<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Matter;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Days;
use App\Models\Hour;
//use App\Http\Controllers\SessionsCourseController;
use App\Models\sessionsCourse;
use PhpParser\Node\Stmt\TryCatch;
use stdClass;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::join('teachers', 'courses.teacher_id', '=', 'teachers.id')
        ->select('courses.id', 'courses.desc AS name', 'courses.semester AS semester', 'teachers.name AS teacher name','teachers.last_name as teacher last name', 'matters.desc AS matter', 'classroom_id AS classroom')
        ->join('matters', 'courses.matter_id', '=', 'matters.id')
        ->get();
        if (count($courses) < 1)
        {
        $noempty =  new Collection([ 'items' => '{"desc":"nodata","id":1}']);
        return view('courses.index', ['courses' => $noempty]);
        }
        //$result = Course::all();
        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $matters = Matter::all();
        $classrooms = Classroom::all();
        $teachers = Teacher::all();
        $hours = Hour::all();
        $days = Days::all();
        return view('courses.create', ['matters' => $matters,
                                        'classrooms' => $classrooms,
                                        'teachers' => $teachers,
                                        'hours' => $hours,
                                        'days' => $days]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            
            $horario = json_decode($request->horario);
            Course::create([
                'desc' => $request->desc,
                'semester' => $request->semester,
                'Teacher_id' => $request->teacher,
                'Matter_id' => $request->matter,
                'Classroom_id' => $request->classroom,
                'created_by' => auth()->id(),
            ]);
            $curso = Course::where('desc', '=', $request->desc)
                            ->where('semester', '=', $request->semester)
                            ->where('Teacher_id', '=', $request->teacher)
                            ->where('Matter_id', '=', $request->matter)
                            ->get();
            $id = $curso->first()->id;
           // echo $id;
            //echo json_encode($horario);

            foreach($horario as $hora)
            {
                sessionsCourse::create([
                    'course_id' => $id,
                    'hour_id' => $hora[1],
                    'day_id' => $hora[0],
                    'created_by'=> auth()->id(),
                ]);
            }
            return to_route('courses.index')->with('status', __('New Course added'));
            
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('courses.index')->with('status', __($th->getMessage()));
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        try {
            //echo $request->search;
            $query = "%".$request->search."%";
            $result = Course::where('courses.desc','like', $query)
            ->orWhere('courses.semester', 'like', $query)
            ->orWhere('courses.teacher_id', 'like', $query)
            ->join('teachers', 'courses.teacher_id', '=', 'teachers.id')
            ->select('courses.id', 'courses.desc AS name', 'courses.semester AS semester', 'teachers.name AS teacher name','teachers.last_name as teacher last name', 'matters.desc AS matter', 'classroom_id AS classroom')
            ->join('matters', 'courses.matter_id', '=', 'matters.id')
            ->get();
            return view ('courses.index', ['courses' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('courses.index')->with('status', $th->getMessage());
        }
        
    }
    public function view($id)
    {
        try {
            //code...
        $courseselect = Course::where('courses.id', '=', $id)
        ->join('teachers', 'courses.teacher_id', '=', 'teachers.id')
        ->select('courses.id', 'courses.desc AS name', 'courses.semester AS semester', 'teachers.name AS teacher name','teachers.last_name as teacher last name', 'matters.desc AS matter', 'classroom_id AS classroom', 'courses.created_by', 'courses.updated_by')
        ->join('matters', 'courses.matter_id', '=', 'matters.id')
        ->first();
        $created_by = User::find($courseselect->first()->created_by);
        $updated_by = User::find($courseselect->first()->updated_by);
        $hours = Hour::all();
        $days = Days::all();
        $schedule = sessionsCourse::where('course_id', '=', $id)->get();
        //echo $courseselect;
        return view('courses.view', ['course' => $courseselect,
        'created_by' => $created_by,
        'updated_by' => $updated_by,
        'hours' => $hours,
        'days' => $days,
        'schedule' =>$schedule]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('courses.index')->with('status', $th->getMessage());
            
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Course = null)
    {
        //
        try {
            //code...
            $result = Course::find($Course);
            return view('courses.edit', ['Course' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('courses.index')->with('status', $th->getMessage());
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        //
        try {
            //code...
            $register = Course::find($id);
            $register->names = $request->names;
            $register->last_name = $request->last_name;
            $register->second_last_name = $request->second_last_name;
            $register->age = $request->age;
            $register->semester = $request->semester;
            $register->updated_by = auth()->id();
            $register->save();
            return to_route('courses.index')->with('status', __('Course updated'));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('courses.index')->with('status', __($th->getMessage()));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $Course)
    {
        //
        try {
            $result = Course::find($Course->id);
            $result->delete();
            return to_route('courses.index')->with('status', __('Course '.$Course->id.' deleted '));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('courses.index')->with('status', $th->getMessage());
        }
    }

    public function restore()
    {
        $trash = Course::onlyTrashed()->get();
        return view ('courses.restore', ['courses' => $trash]);
        //return $trash;
    }

    public function restoredd(Request $request)
    {
        try {
            Course::withTrashed()->find($request->id)->restore();
            return to_route('courses.restore')->with('status', __('Course '.$request->id.' restored '));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('courses.restore')->with('status', __($th->getMessage()));
        }
        
    }
}