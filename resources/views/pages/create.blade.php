@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h4 class="mb-3">New issue</h4>
            <form>
                <div class="mb-3">
                    <label for="project">Project</label>
                    <select class="custom-select d-block w-100" id="project" required>
                        <option value=""></option>
                        <option>Loop (core)</option>
                        <option>Loop IM</option>
                        <option>Loop - Email (Inbox)</option>
                        <option>NMS Production Reports</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tracker">Tracker</label>
                    <select class="custom-select d-block w-100" id="tracker" required>
                        <option value=""></option>
                        <option>Bug</option>
                        <option>Feature</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" placeholder="" value="" required>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="" value="" required>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select class="custom-select d-block w-100" id="status" required>
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
                    <select class="custom-select d-block w-100" id="priority" required>
                        <option value=""></option>
                        <option>Low</option>
                        <option>Normal</option>
                        <option>High</option>
                    </select>
                </div>
                <hr class="mb-4">
                <button type="button" class="btn btn-outline-secondary">Create</button>
                <button type="button" class="btn btn-outline-secondary">Create and continue</button>
                <button type="button" class="btn btn-outline-secondary">Preview</button>
            </form>
        </div>
    </div>
</div>
@endsection