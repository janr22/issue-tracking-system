@extends('layouts.app')

@section('content')
@foreach($tickets as $ticket)
<div class="container">
    <div class="row">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Ticket #{{ $ticket->id }}</h4>
            <hr class="mb-0">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3 border-bottom">
                {{ $ticket->status }}
                <div class="mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Reopen issue</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">New issue</button>
                </div>
            </div>

            <h1>{{ $ticket->subject }}</h1>
            <p>{{ $ticket->description }}</p>
        </div>
        <div class="col-md-4 order-md-2 mb-4">
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Assignee</p>
                        <div>
                            @foreach($ticket->users as $user)
                            <p class="my-0"><img class="rounded-circle mr-1" src="{{ $user->avatar }}" height="20px" width="20px" />{{ $user->name }}</p>
                            @endforeach
                        </div>
                        <select class="selectpicker" multiple name="users[]">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Milestone</p>
                        <div>

                        </div>
                    </div>
                    <span class="text-muted">Edit</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Time tracking</p>
                        <div>

                        </div>
                    </div>
                    <span class="text-muted">Edit</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Due date</p>
                        <div>

                        </div>
                    </div>
                    <span class="text-muted">Edit</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Labels</p>
                        <div>

                        </div>
                    </div>
                    <span class="text-muted">Edit</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Confidentiality</p>
                        <div>

                        </div>
                    </div>
                    <span class="text-muted">Edit</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Lock issue</p>
                        <div>

                        </div>
                    </div>
                    <span class="text-muted">Edit</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Participants</p>
                        <div>
                            @foreach($ticket->users as $user)
                            <img class="rounded-circle mr-1" src="{{ $user->avatar }}" height="30px" width="30px" />
                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Notifications</p>


                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1"></label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endforeach
@endsection