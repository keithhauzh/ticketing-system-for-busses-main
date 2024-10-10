<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;

// load the policy
use App\Models\Post;

// Gate is to control who can access what
use Illuminate\Support\Facades\Gate;

class TicketController extends Controller
{
    /**
     * (view) Display a listing of the tickets by the current user
     */
    public function index()
    {
        // load the tickets
        // ->latest() is to order the tickets by descending order
        $tickets = DB::table('tickets')->latest()->get();
        return view("tickets.index", [ "tickets" => $tickets ]);
        // compact('tickets')
    }

    /**
     * (view) Show the form for creating a new ticket.
     */
    public function create()
    {
        return view("tickets.create");
    }

    /**
     * (action) Store a newly created ticket in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'traveltime' => 'required',
            'destination' => 'required',
            'price' => 'required'
        ]);

        Gate::authorize('create', Ticket::class);

        // create ticket with the current logged in user (user_id) built-in
        $post = auth()->user()->tickets()->create( $validatedData );

        return redirect("/tickets");
    }

    /**
     * (view) Display the specified ticket.
     */
    public function show(string $id)
    {
        // load the ticket by id
        $ticket = Ticket::findOrFail($id);
        return view("tickets.show", [ 'ticket' => $ticket ]);
    }

    /**x
     * (view) Show the form for editing the specified ticket.
     */
    public function edit(string $id)
    {   
        // load the ticket by id
        $ticket = Ticket::findOrFail($id);
        return view("tickets.edit", compact('ticket'));
        // compact('ticket') is equal to [ 'ticket' => $ticket ]
    }

    /**
     * (action) Update the specified ticket in storage.
     */
    public function update(Request $request, string $id)
    {
        // load the ticket by id
        $ticket = Ticket::findOrFail($id);

        // make sure only the ticket owner can update their own ticket
        Gate::authorize('update',$ticket);

        $validatedData = $request->validate([
            'title' => 'required',
            'traveltime' => 'required',
            'destination' => 'required',
            'price' => 'required'
        ]);

        // pass in validated data to update the ticket
        $ticket->update($validatedData);

        return redirect("/tickets");
    }

    /**
     * (action) Remove the specified post from storage.
     */
    public function destroy(string $id)
    {
        // load the post by id
        $ticket = Ticket::findOrFail($id);

        Gate::authorize('delete',$ticket);

        // delete post
        $ticket->delete();

        return redirect("/tickets");
    }
}
