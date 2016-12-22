@extends('layout')

@section('content')
    <div class="container profile">
        @include('includes.notify')
        @if(!Auth::user()->verified)
            @include('includes.verification')
        @endif
        <h4>Profile page</h4>
        <hr>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group @if ($errors->has('username')) has-error @endif">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="username" name="username" 
                                    placeholder="Username" 
                                    autocomplete="off" 
                                    value="{{ Request::old('username') ?: Auth::user()->username}}">
                                @if ($errors->has('username'))
                                    <small class="help-block">{{ $errors->first('username') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group @if ($errors->has('firstname')) has-error @endif">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="firstname" name="firstname" 
                                    placeholder="Firstname" 
                                    autocomplete="off" 
                                    value="{{ Request::old('firstname') ?: Auth::user()->firstname }}">
                                @if ($errors->has('firstname'))
                                    <small class="help-block">{{ $errors->first('firstname') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group @if ($errors->has('lastname')) has-error @endif">
                                <input type="text" 
                                    class="form-control" 
                                    id="lastname" 
                                    name="lastname" 
                                    placeholder="Lastname" 
                                    autocomplete="off" 
                                    value="{{ Request::old('lastname') ?: Auth::user()->lastname }}">
                                @if ($errors->has('lastname'))
                                    <small class="help-block">{{ $errors->first('lastname') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group @if ($errors->has('phonenumber')) has-error @endif">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="phonenumber" 
                                    name="phonenumber" 
                                    placeholder="Phone number" 
                                    autocomplete="off" 
                                    value="{{ Request::old('phonenumber') ?: Auth::user()->phonenumber }}">
                                @if ($errors->has('phonenumber'))
                                    <small class="help-block">{{ $errors->first('phonenumber') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="form-group @if ($errors->has('email')) has-error @endif">
                                <input 
                                    type="email" 
                                    class="form-control" 
                                    id="email"
                                    name="email" 
                                    placeholder="Email" 
                                    autocomplete="off" 
                                    value="{{ Request::old('email') ?: Auth::user()->email }}">
                                @if ($errors->has('email'))
                                    <small class="help-block">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-12">
                        <input type="hidden" name="_token" value="{{ Session::token() }}" />
                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
        
    </div>
@endsection