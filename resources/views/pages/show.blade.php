@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        {{ $ticket->subject }}
        </div>
    </div>
</div>
@endsection