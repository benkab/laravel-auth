<div class="verification">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="alert alert-info alert-dismissible" role="alert">
                <span><strong>IMPORTANT</strong></span>
                <br>Please verify your account before having full access to all the application's features.
                <!--<a class="verify hidden-sm hidden-xs" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Verify
                </a>
                <br class="hidden-lg hidden-md">
                <br class="hidden-lg hidden-md">
                <a class="verify-sm hidden-lg hidden-md" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Verify
                </a>-->
            </div>
            <br>
            <p>
                <span>
                    <b>Verify account via email</b>
                </span>
                <a class="pull-right sendEmail" href="{{ route('verify.email') }}">Send an email</a>
            </p>
            <hr>
            <p>
                <span>
                    <b>Verify account via phone number</b>
                </span>
                @if(Auth::user()->code)
                <a class="pull-right sendCode" href="{{ route('send.code') }}">Resend the code</a>
                @endif
                @if(!Auth::user()->code)
                <a class="pull-right sendCode" href="{{ route('send.code') }}">Send a code</a>
                @endif
            </p>
            <br>
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                <form action="{{ route('verify.code') }}" method="POST">
                    <div class="form-group @if ($errors->has('code')) has-error @endif">
                        <label for="code" class="control-label">Enter the code</label>
                        <input type="text" class="form-control code" id="code" name="code" autocomplete="off" value="{{ Request::old('code') }}">
                        @if ($errors->has('code'))
                            <small class="help-block">{{ $errors->first('code') }}</small>
                        @endif
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}" />
                    <button type="submit" class="btn btn-primary btn-sm btn-code">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>