<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('users')->get();
        return view('pages.home', compact('tickets'));
    }

    public function create()
    {
        return view('pages.create_ticket');
    }

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

    public function show($id)
    {
        $ticket = Ticket::with('users')->where('tickets.id', $id)->first();
        $users = User::all();
        return view('pages.show_ticket', compact(['ticket', 'users']));
    }

    public function assignee(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        // $ticket->update(['status' => 'Assigned']);
        $ticket->users()->sync($request->users);
        return redirect()->back();
    }

    public function status($id)
    {
        $ticket = Ticket::find($id);
        if ($ticket->status == 'Closed') {
            $ticket->update(['status' => 'Open']);
        } else {
            $ticket->update(['status' => 'Closed']);
        }
        return redirect()->back();
    }
}
