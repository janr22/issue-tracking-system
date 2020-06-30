@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Role</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>John Rey Balinag</td>
                        <td>balinagrey@gmail.com</td>
                        <td>Enabled</td>
                        <td>Admin</td>
                        <td>Date</td>
                        <td>
                            <button type="button" class="btn btn-outline-secondary">Disable</button>
                            <button type="button" class="btn btn-outline-secondary">Upgrade</button>
                            <button type="button" class="btn btn-outline-secondary">Downgrade</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection