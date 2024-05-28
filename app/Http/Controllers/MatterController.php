<?php

namespace App\Http\Controllers;

use App\Models\Matter;
use Illuminate\Http\Request;
use App\Models\User;

class matterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $matters = Matter::all();
        return view('matters.index', ['matters' => $matters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('matters.create');
    }

    public function view($id)
    {
        $matterSelect = Matter::find($id);
        $created_by = User::find($matterSelect->created_by);
        $updated_by = User::find($matterSelect->updated_by);
        //echo $studentSelect;
        return view('matters.view', ['matter' => $matterSelect,
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
            Matter::create([
                'desc' => $request->get('desc'),
                'semester' => $request->get('semester'),
                'hoursPerWeek' => $request->get('hoursPerWeek'),
                'created_by' => auth()->id()
            ]);
            return to_route('matters.index')->with('status', __('New matter added'));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('matters.index')->with('status', __($th->getMessage()));
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
            $result = Matter::where('desc','like', $query, )
            ->orWhere('semester', 'like', $query)
            ->orWhere('hoursPerWeek', 'like', $query)->get();
            return view ('matters.index', ['matters' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('matters.index')->with('status', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            //code...
            $result = Matter::find($id);
            return view('matters.edit', ['matter' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('matters.index')->with('status', $th->getMessage());
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
            $register = Matter::find($id);
            $register->desc = $request->desc;
            $register->semester = $request->semester;
            $register->hoursPerWeek = $request->hoursPerWeek;
            $register->updated_by = auth()->id();
            $register->save();
            return to_route('matters.index')->with('status', __('matter updated'));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('matters.index')->with('status', __($th->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $matter)
    {
        //
        try {
            $result = Matter::find($matter->id);
            $result->delete();
            return to_route('matters.index')->with('status', __('matter '.$matter->id.' deleted '));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('matters.index')->with('status', $th->getMessage());
        }
    }
    public function restore()
    {
        try {
            $trash = Matter::onlyTrashed()->get();
            return view ('matters.restore', ['matters' => $trash]);   
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('matters.index')->with('status', $th->getMessage());;   
        }
    }
    public function restoredd(Request $request)
    {
        try {
            Matter::withTrashed()->find($request->id)->restore();
            return to_route('matters.restore')->with('status', __('matter'.$request->id.' restored '));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('matters.restore')->with('status', __($th->getMessage()));
        }
    }
}