<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use LDAP\Result;

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
    public function show(Request $request)
    {
        //
        try {
            //echo $request->search;
            $query = "%".$request->search."%";
            $result = Student::where('names','like', $query, )
            ->orWhere('last_name', 'like', $query)
            ->orWhere('second_last_name', 'like', $query)->get();
            return view ('students.index', ['students' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('students.index')->with('status', $th->getMessage());
        }
        
    }
    public function view($id)
    {
        try {
            //code...

        $studentSelect = Student::find($id);
        $created_by = User::find($studentSelect->created_by);
        $updated_by = User::find($studentSelect->updated_by);
        //echo $studentSelect;
        return view('students.view', ['student' => $studentSelect,
        'created_by' => $created_by,
        'updated_by' => $updated_by]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('students.index')->with('status', $th->getMessage());

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($student = null)
    {
        //
        try {
            //code...
            $result = Student::find($student);
            return view('students.edit', ['student' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('students.index')->with('status', $th->getMessage());
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request, Student $student)
    {
        //
        try {
            //code...
            $register = Student::find($id);
            $register->names = $request->names;
            $register->last_name = $request->last_name;
            $register->second_last_name = $request->second_last_name;
            $register->age = $request->age;
            $register->semester = $request->semester;
            $register->updated_by = auth()->id();
            $register->save();
            return to_route('students.index')->with('status', __('Student updated'));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('students.index')->with('status', __($th->getMessage()));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $student)
    {
        //
        try {
            $result = Student::find($student->id);
            $result->delete();
            return to_route('students.index')->with('status', __('Student '.$student->id.' deleted '));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('students.index')->with('status', $th->getMessage());
        }
    }

    public function restore()
    {
        $trash = Student::onlyTrashed()->get();
        return view ('students.restore', ['students' => $trash]);
        //return $trash;
    }

    public function restoredd(Request $request)
    {
        try {
            Student::withTrashed()->find($request->id)->restore();
            return to_route('students.restore')->with('status', __('Student '.$request->id.' restored '));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('students.restore')->with('status', __($th->getMessage()));
        }
        
    }
}
