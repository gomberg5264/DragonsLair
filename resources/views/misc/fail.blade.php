@extends('_resources.layouts.master')

@section('title')
    Error Page
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4 error">
            <h1>Error Page</h1>
            @switch($errorCode)
                @case('unauthenticated')
                    <p>
                        Sorry, you need to be logged in to access that page.
                    </p>
                    @break
                @case('wrongPermissions')
                    <p>
                        Sorry, you do not have the permissions required for that.
                    </p>
                    @break
                @case('incorrectCredentials')
                    <p>
                        The username or password you entered is incorrect.
                    </p>
                    @break
                @case('')
                    <p>
                        Were you looking for the error page? Well if so congratulations, you've found it. ;)
                    </p>
                    @break
                @default
                    <p>
                        Unexpected <em>{{$errorCode}}</em> error, please contact the <a href="mailto:webmaster@dragonslair.test">webmaster</a> for support.
                    </p>
                    @break
            @endswitch
            {!!link_to_route('dashboard', 'Go to Dashboard')!!} <br>
            {!!link_to_route('welcome', 'Go to main')!!}
        </div>
    </div>

@endsection
