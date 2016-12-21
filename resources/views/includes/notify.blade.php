@if (Notify::all())
        @foreach (Notify::get('success') as $alert)
            <div class="alert alert-success" style="padding-left:30px !important; padding-right:30px !important; border-radius:0px !important;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b>{{ $alert }}</b>
            </div>
        @endforeach

        @foreach (Notify::get('error') as $alert)
            <div class="alert alert-danger" style="padding-left:30px !important; padding-right:30px !important; border-radius:0px !important;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b>{{ $alert }}</b>
            </div>
        @endforeach

        @foreach (Notify::get('info') as $alert)
            <div class="alert alert-info" style="padding-left:30px !important; padding-right:30px !important; border-radius:0px !important;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b>{{ $alert }}</b>
            </div>
        @endforeach

        @foreach (Notify::get('warning') as $alert)
            <div class="alert alert-warning" style="padding-left:30px !important; padding-right:30px !important; border-radius:0px !important;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b>{{ $alert }}</b>
            </div>
        @endforeach
@endif