@extends('layouts.app')

@section('content')
<div class="container-xl clearfix px-2 px-md-3 px-lg-4">
    <div>
        <div class="formSection readOnly">
            <form method="post" action="{{route('subject', $ticket->id)}}">
                <div class="d-flex flex-column flex-md-row align-items-center pt-2">
                    @csrf
                    <h1 class="text-muted mb-2">#{{ $ticket->id }}</h1>
                    <h1 class="input-wrap mr-md-auto pb-1"><span class="width-plus pr-1" aria-hidden="true">{{$ticket->subject}}</span><input class="input" value="{{$ticket->subject}}" disabled type="text" name="subject"></h1>
                    @auth
                    @if(Auth::user()->id == $ticket->owner->id || Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <button type="button" class="btn btn-sm btn-outline-secondary editButton mr-1">Edit</button>
                    <div class="actionButtons">
                        <button type="submit" class="btn btn-sm btn-outline-secondary saveButton" type="submit">Save</button>
                        <a href="#" class="ml-2 cancelButton">Cancel</a>
                    </div>
                    @endif
                    @endauth
                    <a href="{{ url('/create') }}" role="button" class="btn btn-sm btn-success editButton">New issue</a>
                </div>
            </form>
        </div>
        <span class="State {{ $ticket->status == 'Open' || $ticket->status == 'New' ? 'bg-success' : 'bg-danger' }}">
            @if ($ticket->status == 'Open' || $ticket->status =='New')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                <path d="M12 7a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0112 7zm1 9a1 1 0 11-2 0 1 1 0 012 0z"></path>
                <path fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z"></path>
            </svg>
            @else
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                <path d="M2.5 12c0-5.24 4.288-9.5 9.593-9.5a9.608 9.608 0 017.197 3.219.75.75 0 001.12-.998A11.108 11.108 0 0012.093 1C5.973 1 1 5.919 1 12s4.973 11 11.093 11c5.403 0 9.91-3.832 10.893-8.915a.75.75 0 10-1.472-.285c-.848 4.381-4.74 7.7-9.421 7.7C6.788 21.5 2.5 17.24 2.5 12z"></path>
                <path d="M12 17a1 1 0 100-2 1 1 0 000 2zm0-10a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0112 7zm11.28.78a.75.75 0 00-1.06-1.06l-3.47 3.47-1.47-1.47a.75.75 0 10-1.06 1.06l2 2a.75.75 0 001.06 0l4-4z"></path>
            </svg>
            @endif
            {{ $ticket->status }}

        </span>
        <span class="ml-1 font-weight-bolder">{{ $ticket->owner->name }}</span> open this issue ·
        {{ count($ticket->comments) }} comments
    </div>
    <hr>
    <div class="row">
        <div class="col-md-9 order-md-1">
            <div class="card border-info">
                <div class="card-header border-info" style="background-color: #f1f8ff;">
                    <img class="rounded-circle mr-1" src=" {{ $ticket->owner->avatar }}" height="20px" width="20px" />
                    <span class="font-weight-bolder">{{ $ticket->owner->name }}</span>
                    <span class="text-muted">created {{ $ticket->created_at->diffForHumans(null, true).' ago'}}</span>
                    @auth
                    @if(Auth::user()->id == $ticket->owner->id || Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <small class="float-sm-right">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                            <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </small>
                    @endif
                    @endauth
                </div>
                <div class="card-body">
                    <p>{{ $ticket->description }}</p>
                </div>
            </div>
            @foreach($ticket->comments as $comment)
            <div class="card border-info mt-4">
                <div class="card-header border-info" style="background-color: #f1f8ff;">
                    <img class="rounded-circle mr-1" src=" {{ $comment->user->avatar }}" height="20px" width="20px" />
                    <span class="font-weight-bolder">{{ $comment->user->name }}</span>
                    <span class="text-muted">commented
                        {{ $comment->created_at->diffForHumans(null, true).' ago'}}</span>
                    @auth
                    @if(Auth::user()->id == $ticket->owner->id || Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <small class="float-sm-right">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                            <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </small>
                    @endif
                    @endauth
                </div>
                <div class="card-body">
                    <p>{{ $comment->body }}</p>
                </div>
            </div>
            @endforeach

            <div class="card mt-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Write</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Preview</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content pb-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <form id="commentForm" method="post" action="{{ route('comment') }}">
                                @csrf
                                <textarea type="text" name="body" class="form-control" data-bind="body" rows="4"></textarea>
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}" />
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropzone">
                                        <div class="info"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-right">
                        @auth
                        @if(Auth::user()->id == $ticket->owner->id || Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                        <form method="post" id="statusForm" action="{{route('status', $ticket->id)}}">@csrf</form>
                        @if($ticket->status =='Open' || $ticket->status =='New')
                        <button form="statusForm" type="submit" class="btn btn-outline-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" fill="red">
                                <path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 0110.65-5.003.75.75 0 00.959-1.153 8 8 0 102.592 8.33.75.75 0 10-1.444-.407A6.5 6.5 0 011.5 8zM8 12a1 1 0 100-2 1 1 0 000 2zm0-8a.75.75 0 01.75.75v3.5a.75.75 0 11-1.5 0v-3.5A.75.75 0 018 4zm4.78 4.28l3-3a.75.75 0 00-1.06-1.06l-2.47 2.47-.97-.97a.749.749 0 10-1.06 1.06l1.5 1.5a.75.75 0 001.06 0z"></path>
                            </svg>
                            Close issue
                        </button>
                        @else
                        <button form="statusForm" type="submit" class="btn btn-outline-secondary">Reopen issue</button>
                        @endif
                        @endif
                        @endauth
                        <button form="commentForm" type="submit" role="button" class="btn btn-success">Comment</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 order-md-2 mb-4">
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
                    @if(Auth::user()->id == $ticket->owner->id || Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <a type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 25px;">
                        <span class="text-muted">Edit</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <form class="px-3 py-2" method="post" action="{{route('assignee', $ticket->id)}}">
                            @csrf
                            <div class="form-group mb-1">
                                <label for="assignee">Assign people to this issue</label>
                                <select multiple="multiple" class="form-control custom-select" name="users[]" id="assignee">
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
                            None
                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->id == $ticket->owner->id || Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <span class="text-muted">Edit</span>
                    @endif
                    @endauth
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Time tracking</p>
                        <div>
                            None
                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->id == $ticket->owner->id || Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <span class="text-muted">Edit</span>
                    @endif
                    @endauth
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Due date</p>
                        <div>
                            None
                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->id == $ticket->owner->id || Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <span class="text-muted">Edit</span>
                    @endif
                    @endauth
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Labels</p>
                        <div>
                            @foreach($ticket->labels as $label)
                            <button type="button" class="py-0 px-1 mb-1 d-inline btn btn-{{ $label->color }}">{{ $label->name }}</button>
                            @endforeach
                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->id == $ticket->owner->id || Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <a type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 25px;">
                        <span class="text-muted">Edit</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <form class="px-3 py-2" method="post" action="{{route('label', $ticket->id)}}">
                            @csrf
                            <div class="form-group mb-1">
                                <label for="assignee">Assign people to this issue</label>
                                <select multiple="multiple" class="form-control custom-select" name="labels[]" id="assignee">
                                    @foreach ($labels as $label)
                                    <option value="{{ $label->id }}" {{ isset($label) && in_array($label->id, $ticket->labels()->pluck('labels.id')->toArray()) ? 'selected' : '' }}>
                                    <div class="float-left color mr-2" style="margin-top: 2px; background-color: #d73a4a"></div>
                                        {{ $label->name }}
                                    </option>
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
                        <p class="my-0">Confidentiality</p>
                        <div>
                            @if($ticket->confidentiality =='Not confidential')
                            <svg class="mb-1" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                            @else
                            <svg class="mb-1" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299l.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                                <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709z" />
                                <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z" />
                            </svg>
                            @endif
                            {{ $ticket->confidentiality }}
                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->id == $ticket->owner->id || Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <a type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 25px;">
                        <span class="text-muted">Edit</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <form method="post" action="{{route('confidentiality', $ticket->id)}}">
                            @csrf
                            <button class="dropdown-item {{ $ticket->confidentiality == 'Confidential' ? 'disabled' : '' }}" type="submit" name="submit" value="Confidential">Confidential</button>
                            <button class="dropdown-item {{ $ticket->confidentiality == 'Not confidential' ? 'disabled' : '' }}" type="submit" name="submit" value="Not confidential">Not confidential</button>
                        </form>
                    </div>
                    @endif
                    @endauth
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <p class="my-0">Lock issue</p>
                        <div>
                            @if($ticket->lock =='Lock')
                            <svg class="mb-1" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z" />
                            </svg>
                            @else
                            <svg class="mb-1" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-unlock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.655 8H2.333c-.264 0-.398.068-.471.121a.73.73 0 0 0-.224.296 1.626 1.626 0 0 0-.138.59V14c0 .342.076.531.14.635.064.106.151.18.256.237a1.122 1.122 0 0 0 .436.127l.013.001h7.322c.264 0 .398-.068.471-.121a.73.73 0 0 0 .224-.296 1.627 1.627 0 0 0 .138-.59V9c0-.342-.076-.531-.14-.635a.658.658 0 0 0-.255-.237A1.122 1.122 0 0 0 9.655 8zm.012-1H2.333C.5 7 .5 9 .5 9v5c0 2 1.833 2 1.833 2h7.334c1.833 0 1.833-2 1.833-2V9c0-2-1.833-2-1.833-2zM8.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z" />
                            </svg>
                            @endif
                            {{ $ticket->lock }}
                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->id == $ticket->owner->id || Auth::user()->role == 'admin' || Auth::user()->role == 'moderator' || in_array(Auth::user()->id, $ticket->users()->pluck('users.id')->toArray()))
                    <a type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 25px;">
                        <span class="text-muted">Edit</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <form method="post" action="{{route('lock', $ticket->id)}}">
                            @csrf
                            <button class="dropdown-item {{ $ticket->lock == 'Lock' ? 'disabled' : '' }}" type="submit" name="submit" value="Lock">Lock</button>
                            <button class="dropdown-item {{ $ticket->lock == 'Unlock' ? 'disabled' : '' }}" type="submit" name="submit" value="Unlock">Not confidential</button>
                        </form>
                    </div>
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