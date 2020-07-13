@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex flex-column flex-md-row align-items-center pt-2">
                <h2 class="input-wrap mr-md-auto">Private tickets</h2>
                <a href="{{ url('/create') }}" role="button" class="mb-2 btn-sm btn btn-success">New Ticket</a>
            </div>
            
            <div class="card border-info">
                <table class="table-borderless table-hover table mb-0">
                    <thead class="card-header border-info" style="background-color: #f1f8ff;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Project</th>
                            <th scope="col">Tracker</th>
                            <th scope="col">Status</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Confidentiality</th>
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
                            <td>{{ $ticket->confidentiality  }}</td>
                            <td>{{ $ticket->updated_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="mt-2">
                {{ $tickets->links() }}
            </div>
        </div>
    </div>
    @endsection