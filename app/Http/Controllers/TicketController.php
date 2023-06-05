<?php

namespace App\Http\Controllers;

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
        $tickets = Ticket::all();
        return response()->json($tickets);
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
     */
    public function store(Request $request)
    {
        //
        $ticket = new Ticket;
        $ticket->project_id = $request->project_id;
        $ticket->name = $request->name;
        $ticket->description = $request->description;
        $ticket->status = $request->status;
        $ticket->dead_line = $request->dead_line;
        $ticket->save();
        $data = [
            'message' => 'Ticket created succesfuly',
            'ticket' => $ticket
        ];
        return response()->json($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
        $data = [
            'message' => 'Ticket details',
            'ticket' => $ticket,
            'project' => $ticket->projects
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
        $ticket->status = $request->status;
        $ticket->save();
        $data = [
            'message' => 'Ticket updated successfully',
            'ticket' => $ticket
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
