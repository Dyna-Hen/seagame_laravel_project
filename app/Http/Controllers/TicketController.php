<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ticket = Ticket::all();
        $ticket = TicketResource::collection($ticket);
        return $ticket;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $ticket = Ticket::store($request);
        return response()->json(['success'=>true,'data'=>$ticket],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $ticket = Ticket::all();
        // $ticket = TicketResource::collection($ticket);
        // return $ticket;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $ticket = Ticket::store($request, $id);
        return response()->json(['success'=>true,'data'=>$ticket],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $ticket = Ticket::find($id);
        $ticket->delete();

        return "ticket has been deleted.";
    }
}
