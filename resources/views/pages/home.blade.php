@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ url('/create') }}" role="button" class="mb-2 btn-sm btn btn-success">New Ticket</a>
            <table class="border table table-sm table-striped table-borderless">
                <thead style="background-color: #eeeeee;">
                    <tr class="text-primary">
                        <th scope="col">#</th>
                        <th scope="col">Project</th>
                        <th scope="col">Tracker</th>
                        <th scope="col">Status</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Assignee</th>
                        <th scope="col">Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <th><a href="{{ url('/' . $ticket->id) }}">{{ $ticket->id }}</a></th>
                        <td><a href="{{ url('/' . $ticket->id) }}">{{ $ticket->project }}</a></td>
                        <td>{{ $ticket->tracker}}</td>
                        <td>{{ $ticket->status }}</td>
                        <td>{{ $ticket->priority  }}</td>
                        <td><a href="{{ url('/' . $ticket->id) }}">{{ $ticket->subject}}</a></td>
                        <td>
                            @if (count($ticket->users)>=2)
                            {{ count($ticket->users) }} assignees
                            @elseif (count($ticket->users)==0)
                            No assignee
                            @else
                            @foreach($ticket->users as $user)
                            {{ $user->name }}
                            @endforeach
                            @endif
                        </td>
                        <td>{{ $ticket->updated_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tickets->links() }}
        </div>
    </div>
    @endsection