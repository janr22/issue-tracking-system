@extends('layouts.app')

@section('content')
<div class="container-xl clearfix px-3 px-md-4 px-lg-5">
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2">
            <h1 class="mb-3">{{ $ticket->subject }} <span class="font-weight-light text-muted"> #{{ $ticket->id }}</span></h1>
            <div class="mb-2 mb-md-0">
                <form method="post" action="{{route('status', $ticket->id)}}">
                    @csrf
                    @auth
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    @if($ticket->status =='Open' || $ticket->status =='New')
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Close issue</button>
                    @else
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Reopen issue</button>
                    @endif
                    @else
                    @endif
                    @endauth
                    <a href="{{ url('/create') }}" role="button" class="btn btn-sm btn-success">New issue</a>
                </form>
            </div>
        </div>
    </div>
    <span class="State {{ $ticket->status == 'Open' ? 'bg-success' : 'bg-danger' }}">
        <svg class="mb-1" width="16" height="16" viewBox="0 0 16 16" class="bi bi-exclamation-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
        </svg>
        {{ $ticket->status }}
    </span>
    <hr>

    <div class="row">
        <div class="col-md-8 order-md-1">
            <p>{{ $ticket->description }}</p>
        </div>
        <div class="col-md-4 order-md-2 mb-4">
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Assignee</p>
                        <div>
                            @foreach($ticket->users as $user)
                            <p class="my-0"><img class="rounded-circle mr-1" src="{{ $user->avatar }}" height="20px" width="20px" />{{ $user->name }}</p>
                            @endforeach
                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <a type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 25px;">
                        <span class="text-muted">Edit</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <form class="px-3 py-2" method="post" action="{{route('assignee', $ticket->id)}}">
                            @csrf
                            <div class="form-group mb-1">
                                <label for="assignee">Assign people to this issue</label>
                                <select multiple="multiple" class="form-control" name="users[]" id="assignee">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ isset($ticket) && in_array($user->id, $ticket->users()->pluck('users.id')->toArray()) ? 'selected' : '' }}>
                                        {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-secondary">Ok</button>
                            </div>
                        </form>
                    </div>
                    @endif
                    @endauth

                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Milestone</p>
                        <div>

                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <span class="text-muted">Edit</span>
                    @endif
                    @endauth
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Time tracking</p>
                        <div>

                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <span class="text-muted">Edit</span>
                    @endif
                    @endauth
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Due date</p>
                        <div>

                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <span class="text-muted">Edit</span>
                    @endif
                    @endauth
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Labels</p>
                        <div>

                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <span class="text-muted">Edit</span>
                    @endif
                    @endauth
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Confidentiality</p>
                        <div>
                        {{ $ticket->confidentiality }}
                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))

                    <a type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted">Edit</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                    @endif
                    @endauth
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Lock issue</p>
                        <div>
                        {{ $ticket->lock }}
                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <span class="text-muted">Edit</span>
                    @endif
                    @endauth
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">{{ count($ticket->users) }} participants</p>
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

@endsection