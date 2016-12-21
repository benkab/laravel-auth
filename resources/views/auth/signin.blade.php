@extends('layout')

@section('content')
    <div class="container">
        @include('includes.notify')
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-12 col-xs-12 auth">
            <div class="panel panel-default auth-title">
                <div class="panel-body">
                    <h5>Sign in</h5>
                </div>
            </div>
            <hr>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="signin" action="{{ route('post.signin') }}" method="POST">
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
                        <input type="hidden" name="_token" value="{{ Session::token() }}" />
                        <button type="submit" class="btn btn-success btn-sm btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection