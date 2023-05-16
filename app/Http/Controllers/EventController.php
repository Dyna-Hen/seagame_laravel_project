<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $event = Event::all();
        $event = EventResource::collection($event);
        return $event;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        //
        $event = Event::store($request);
        return response()->json(['success'=>true,'data'=>$event],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $event = Event::find($id);
        return $event;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $event = Event::store($request,$id);
        return response()->json(['success'=>true,'data'=>$event],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $event = Event::find($id);
        $event->delete();

        return "event has been deleted.";
    }

    //Search
    // public function search(Request $request){
    //     $search = $request->input('search');

    //     $events = DB::table('events')->where('name','LIKE','%'.$search.'%'->get());
        
    //     return view('events.index',compact('events'));
    // }

    public function search()
{
    $event = Event::all();
    // dd(request('name'));
    $name = request('name');
    $event = Event::where('name','like','%'.$name.'%')->get();
    return response()->json(['success' => true, 'data' => $event], 200);
}

}
