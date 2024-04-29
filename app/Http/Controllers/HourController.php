<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use App\Models\User;
use Illuminate\Http\Request;

class HourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hours = Hour::all();
        return view('hours.index', ["hours" => $hours]);
    }
    
    public function view($id)
    {
        $hourSelect = Hour::find($id);
        $created_by = User::find($hourSelect->created_by);
        $updated_by = User::find($hourSelect->updated_by);
        //echo $hourSelect;
        return view('hours.view', ['hour' => $hourSelect,
        'created_by' => $created_by,
        'updated_by' => $updated_by]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('hours.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            Hour::create([
                'start_at' => $request->get('start_at'),
                'end_at' => $request->get('end_at'),
                'created_by' => auth()->id()
            ]);
            return to_route('hours.index')->with('status', __('New hour added'));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('hours.index')->with('status', __('Error on sending data'));
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
            $result = Hour::where('start_at','like', $query, )
            ->orWhere('end_at', 'like', $query)->get();
            return view ('hours.index', ['hours' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('hours.index')->with('status', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($hour = null)
    {
        //
        try {
            //code...
            $result = Hour::find($hour);
            return view('hours.edit', ['hour' => $result]);
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('hours.index')->with('status', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request, Hour $hour)
    {
        //
        try {
            //code...
            $register = Hour::find($id);
            $register->start_at = $request->start_at;
            $register->end_at = $request->end_at;
            $register->updated_by = auth()->id();
            $register->save();
            return to_route('hours.index')->with('status', __('Hour updated'));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('hours.index')->with('status', __($th->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $hour)
    {
        //
        try {
            $result = Hour::find($hour->id);
            $result->delete();
            return to_route('hours.index')->with('status', __('hour '.$hour->id.' deleted '));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('hours.index')->with('status', $th->getMessage());
        }
    }

    public function restore()
    {
        $trash = Hour::onlyTrashed()->get();
        return view ('hours.restore', ['hours' => $trash]);
        //return $trash;
    }

    public function restoredd(Request $request)
    {
        try {
            Hour::withTrashed()->find($request->id)->restore();
            return to_route('hours.restore')->with('status', __('hour '.$request->id.' restored '));
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('hours.restore')->with('status', __($th->getMessage()));
        }
    }
}
