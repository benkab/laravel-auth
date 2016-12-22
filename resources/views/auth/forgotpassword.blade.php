@extends('layout')

@section('content')
    <div class="container">
        @include('includes.notify')
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-12 col-xs-12 auth">
            <div class="panel panel-default auth-title">
                <div class="panel-body">
                    <h5>Recover password</h5>
                </div>
            </div>
            <hr>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="signin" action="{{ route('post.forgot.password') }}" method="POST">
                        <div class="form-group @if ($errors->has('email')) has-error @endif">
                            <label for="email" class="control-label recover-password-label" style="padding-bottom: 20px;">Provide your email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" value="{{ Request::old('email') }}">
                            @if ($errors->has('email'))
                                <small class="help-block">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                        <button type="submit" class="btn btn-success btn-sm btn-block submit-login">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection