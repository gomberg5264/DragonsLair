@if(isset($messages))
    @switch($type)
        @case('success')
            <div class="row">
                <div class="col-md-4 col-md-offset-4 success">
                    <ul>
                        @foreach ($messages as $message)
                            <li>{{$message}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @break
        @case('failure')
            <div class="row">
                <div class="col-md-4 col-md-offset-4 error">
                    <ul>
                        @foreach ($messages as $message)
                            <li>{{$message}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @break
        @default
            <div class="row">
                <div class="col-md-4 col-md-offset-4 neutral">
                    <ul>
                        @foreach ($messages as $message)
                            <li>{{$message}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
    @endswitch
@else
    No message to display.
@endif
