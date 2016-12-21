@extends('layout')

@section('content')
    <div class="container">
        @include('includes.notify')
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-12 col-xs-12 auth">
            <div class="panel panel-default auth-title">
                <div class="panel-body">
                    <h5>Sign up</h5>
                </div>
            </div>
            <hr>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="signup" action="{{ route('post.signup') }}" method="POST">
                        <div class="form-group @if ($errors->has('username')) has-error @endif">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" value="{{ Request::old('username') }}">
                            @if ($errors->has('username'))
                                <small class="help-block">{{ $errors->first('username') }}</small>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('firstname')) has-error @endif">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" autocomplete="off" value="{{ Request::old('firstname') }}">
                            @if ($errors->has('firstname'))
                                <small class="help-block">{{ $errors->first('firstname') }}</small>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('lastname')) has-error @endif">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" autocomplete="off" value="{{ Request::old('lastname') }}">
                            @if ($errors->has('lastname'))
                                <small class="help-block">{{ $errors->first('lastname') }}</small>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('phonenumber')) has-error @endif">
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone number" autocomplete="off" value="{{ Request::old('phonenumber') }}">
                            @if ($errors->has('phonenumber'))
                                <small class="help-block">{{ $errors->first('phonenumber') }}</small>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('email')) has-error @endif">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" value="{{ Request::old('email') }}">
                            @if ($errors->has('email'))
                                <small class="help-block">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('password')) has-error @endif">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" value="{{ Request::old('password') }}">
                            @if ($errors->has('password'))
                                <small class="help-block">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('confirmpassword')) has-error @endif">
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Password again" autocomplete="off" value="{{ Request::old('confirmpassword') }}">
                            @if ($errors->has('confirmpassword'))
                                <small class="help-block">{{ $errors->first('confirmpassword') }}</small>
                            @endif
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}" />
                        <button type="submit" class="btn btn-success btn-sm btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection