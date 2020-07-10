@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="border table table-sm table-striped table-borderless">
                <thead style="background-color: #eeeeee;">
                    <tr class="text-primary">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email}}</td>
                        <td>
                            @if ($user->status==0)
                            Enabled
                            @else
                            Disabled
                            @endif
                        </td>
                        <td class="text-uppercase">{{ $user->role }}</td>
                        <td>

                            <form class="d-inline" method="post" action="{{route('user_status', $user->id)}}">
                                @csrf
                                @if( $user->status == '0')
                                <button type="submit" class="btn btn-sm btn-danger" name="status" value='1'>Disable</button>
                                @else
                                <button type="submit" class="btn btn-sm btn-success" name="status" value="0">Enable</button>
                                @endif
                            </form>
                            <form class="d-inline" method="post" action="{{route('role', $user->id)}}">
                                @csrf
                                @if( $user->role == 'user')
                                <button type="submit" class="btn btn-sm btn-success" name="role" value="moderator">Upgrade</button>
                                @else
                                <button type="submit" class="btn btn-sm btn-danger" name="role" value="user">Downgrade</button>
                                @endif
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->render() }}
        </div>
    </div>
    @endsection