@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h4 class="mb-3">New issue</h4>
            <form method="post" action="{{ route('store') }}">
                @csrf
                <div class="mb-3">
                    <label for="project">Project</label>
                    <select class="custom-select d-block w-100" name="project" required>
                        <option value=""></option>
                        <option>Loop (core)</option>
                        <option>Loop IM</option>
                        <option>Loop - Email (Inbox)</option>
                        <option>NMS Production Reports</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tracker">Tracker</label>
                    <select class="custom-select d-block w-100" name="tracker" required>
                        <option value=""></option>
                        <option>Bug</option>
                        <option>Feature</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" required>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="5" name="description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select class="custom-select d-block w-100" name="status" required>
                        <option value=""></option>
                        <option>Closed</option>
                        <option>New</option>
                        <option>Assigned</option>
                        <option>In-Progress</option>
                        <option>Resolved</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="priority">Priority</label>
                    <select class="custom-select d-block w-100" name="priority" required>
                        <option value=""></option>
                        <option>Low</option>
                        <option>Normal</option>
                        <option>High</option>
                    </select>
                </div>
                <hr class="mb-4">
                <button type="submit" class="btn btn-outline-secondary">Create</button>
                <button type="button" class="btn btn-outline-secondary">Preview</button>
            </form>
        </div>
    </div>
</div>
@endsection