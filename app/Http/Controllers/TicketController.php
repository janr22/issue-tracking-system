<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $tickets = DB::table('tickets')->distinct()
            ->leftjoin('tickets_users', 'tickets.id', '=', 'tickets_users.ticket_id')
            ->leftjoin('users', 'users.id', '=', 'tickets_users.user_id')
            ->select('tickets.*', 'users.name')
            ->get();
        return view('pages.home', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create_ticket');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $ticket = $request->user()->tickets()->create($request->all());
            $ticket->save();
            return redirect('/');
        } else {
            $ticket = new Ticket([
                'project' => $request->get('project'),
                'subject' => $request->get('subject'),
                'email' => $request->get('email'),
                'description' => $request->get('description'),
                'status' => $request->get('status'),
                'tracker' => $request->get('tracker'),
                'priority' => $request->get('priority')
            ]);
            $ticket->save();
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tickets = Ticket::with('users')->where('tickets.id', $id)->get();
        $users = User::all();
        return view('pages.show_ticket', compact(['tickets', 'users']));

        // $tickets = Ticket::find($id);
        // $tickets->users()->attach(3);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
