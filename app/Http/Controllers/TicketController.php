<?php

namespace App\Http\Controllers;

use App\Label;
use App\Comment;
use App\Ticket;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\Captcha;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('users')->where('confidentiality', 'Public')->paginate(5);
        return view('pages.home', compact('tickets'));
    }

    public function userTicket(Request $request)
    {
        $tickets = $request->user()->owns()->paginate(5);
        return view('pages.user_ticket', compact('tickets'));
    }

    public function privateTicket(Request $request)
    {
        $tickets = Ticket::with('users')->where('confidentiality', 'Private')->paginate(5);
        return view('pages.private_ticket', compact('tickets'));
    }

    public function create()
    {
        return view('pages.create_ticket');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => new Captcha()
        ]);

        if (Auth::check()) {
            $ticket = $request->user()->tickets()->create($request->all());
            $ticket->save();
            return redirect('/' . $ticket->id);
        } else {
            $ticket = new Ticket([
                'project' => $request->get('project'),
                'subject' => $request->get('subject'),
                'email' => $request->get('email'),
                'description' => $request->get('description'),
                'status' => $request->get('status'),
                'tracker' => $request->get('tracker'),
                'priority' => $request->get('priority'),
                'owner_id' => 1,
            ]);
            $ticket->save();
            return redirect('/' . $ticket->id);
        }
    }

    public function show($id)
    {
        $ticket = Ticket::with('users.comments', 'labels', 'owner')
            ->where('tickets.id', $id)
            ->first();
        $users = User::where('users.id', '!=' , 1)->get();
        $labels = Label::all();
        return view('pages.show_ticket', compact(['ticket', 'users', 'labels']));
    }

    public function assignee(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->users()->sync($request->users);
        return redirect()->back();
    }

    public function status($id)
    {
        $ticket = Ticket::findOrFail($id);
        if ($ticket->status == 'Closed') {
            $ticket->update(['status' => 'Open']);
        } else {
            $ticket->update(['status' => 'Closed']);
        }
        return redirect()->back();
    }

    public function confidentiality(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update(['confidentiality' => $request->submit]);
        return redirect()->back();
    }

    public function lock(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update(['lock' => $request->submit]);
        return redirect()->back();
    }

    public function subject(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update(['subject' => $request->subject]);
        return redirect()->back();
    }

    public function description(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update(['description' => $request->description]);
        return redirect()->back();
    }

    public function label(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->labels()->sync($request->labels);
        return redirect()->back();
    }
}
