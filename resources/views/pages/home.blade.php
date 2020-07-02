@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ url('/create') }}" role="button" class="mb-2 btn btn-outline-secondary">New Ticket</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
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
                        <td>{{ $ticket->name}}</td>
                        <td>{{ $ticket->updated_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection