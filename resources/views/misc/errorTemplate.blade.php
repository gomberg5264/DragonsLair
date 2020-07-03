<?php
    $errs = $errors->all();
?>
    @if ($errs != [])
        <div class="row">
            <div class="col-md-4 col-md-offset-4 error">
                <ul>
                    @foreach ($errs as $err)
                        <li>
                            @switch($err)
                                @case('case')
                                    message
                                    @break
                                @case('case')
                                    message
                                    @break
                                @case('case')
                                    message
                                    @break
                                @case('case')
                                    message
                                    @break
                                @case('case')
                                    message
                                    @break
                                @default
                                    {{$err}}
                                    @break
                            @endswitch
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
