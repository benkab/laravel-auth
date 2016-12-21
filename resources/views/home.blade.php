@extends('layout')

@section('content')
    <div class="container">
        @include('includes.notify')
        @if(!Auth::user()->verified)
            @include('includes.verification')
        @endif
    </div>
@endsection