@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h4 class="mb-3">New issue</h4>
            <form method="post" action="{{ route('store') }}">
                @csrf
                @auth
                <input type="hidden" name="owner_id" value="{{ Auth::user()->id }}" />
                @endauth
                <div class="mb-3">
                    <label for="project">Project</label>
                    <select class="custom-select d-block w-100" value="{{  old('project') }}" name="project" required>
                        <option value=""></option>
                        <option>Loop (core)</option>
                        <option>Loop IM</option>
                        <option>Loop - Email (Inbox)</option>
                        <option>NMS Production Reports</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tracker">Tracker</label>
                    <select class="custom-select d-block w-100" value="{{  old('tracker') }}" name="tracker" required>
                        <option value=""></option>
                        <option>Bug</option>
                        <option>Feature</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" value="{{  old('subject') }}" required>
                </div>
                @guest
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{  old('email') }}" required>
                </div>
                @endguest
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea id="editor" data-preview="#previewTicket" class="form-control" rows="5" name="description" required>{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select class="custom-select d-block w-100" @guest disabled @endguest name="status" value="{{  old('status') }}" required>
                        <option>New</option>
                        <option>Closed</option>
                        <option>Assigned</option>
                        <option>In-Progress</option>
                        <option>Resolved</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="priority">Priority</label>
                    <select class="custom-select d-block w-100" @guest disabled @endguest name="priority" value="{{  old('priority') }}" required>
                        <option selected>Normal</option>
                        <option>Low</option>
                        <option>High</option>
                    </select>
                </div>
                @guest
                <div class="mb-3">
                    <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"> </div>
                    @if ($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display:block">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                    @endif
                </div>
                @endguest
                <hr class="mb-4">
                <button type="submit" class="btn btn-success">Create</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#descriptionModal">
                    Preview
                </button>
            </form>
            <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header py-2">
                            <h5 class="modal-title" id="descriptionModalLabel">Description</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="previewTicket" class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection