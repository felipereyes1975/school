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
    public function show(Request $request)
    {
        //
        try {
            //echo $request->search;
            $query = "%".$request->search."%";
            $result = Teacher::where('name','like', $query, )
            ->orWhere('last_name', 'like', $query)
            ->orWhere('second_last_name', 'like', $query)->get();
            return view ('teachers.index', ['teachers' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('teachers.index')->with('status', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            //code...
            $result = Teacher::find($id);
            return view('teachers.edit', ['teacher' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('teachers.index')->with('status', $th->getMessage());
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
            $register = Teacher::find($id);
            $register->name = $request->names;
            $register->last_name = $request->last_name;
            $register->second_last_name = $request->second_last_name;
            $register->updated_by = auth()->id();
            $register->save();
            return to_route('teachers.index')->with('status', __('teacher updated'));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('teachers.index')->with('status', __($th->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $teacher)
    {
        //
        try {
            $result = Teacher::find($teacher->id);
            $result->delete();
            return to_route('teachers.index')->with('status', __('Teacher '.$teacher->id.' deleted '));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('teachers.index')->with('status', $th->getMessage());
        }
    }
    public function restore()
    {
        try {
            $trash = Teacher::onlyTrashed()->get();
            return view ('teachers.restore', ['teachers' => $trash]);   
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('teachers.index')->with('status', $th->getMessage());;   
        }
    }
    public function restoredd(Request $request)
    {
        try {
            Teacher::withTrashed()->find($request->id)->restore();
            return to_route('teachers.restore')->with('status', __('Teacher'.$request->id.' restored '));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('teachers.restore')->with('status', __($th->getMessage()));
        }
    }
}
