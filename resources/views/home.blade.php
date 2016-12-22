@extends('layout')

@section('content')
    <div class="container">
        <h4>Home page</h4>
        <hr>
        @include('includes.notify')
        @if(!Auth::user()->verified)
            @include('includes.verification')
        @endif
    </div>
@endsection