<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $team = Team::all();
        return $team;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $team = Team::store($request);
        return response()->json(['success'=>true,'data'=>$team],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $team = Team::find($id);
        return $team;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $team = Team::store($request, $id);
        return response()->json(['success'=>true,'data'=>$team],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $team = Team::find($id);
        $team->delete();

        return "Team has been deleted.";
    }
}
