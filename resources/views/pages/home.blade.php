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
                    <tr>
                        <th scope="row">1</th>
                        <td>Loop IM</td>
                        <td>Feature</td>
                        <td>In Progress</td>
                        <td>Normal</td>
                        <td>Personas Page</td>
                        <td>Caryl Joy Bumanghat</td>
                        <td>date</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection