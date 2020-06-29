@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>
                <div class="card-body">
                    @guest
                    You are not logged in!
                    @else
                    You are logged in!
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection