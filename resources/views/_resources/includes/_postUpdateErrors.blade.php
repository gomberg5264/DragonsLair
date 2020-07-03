<?php
    $check = (isset($errors))?true:false;
    if($check)
    {
        $errs = $errors->all();
    }
?>
@if($check)
    <div class="row">
        <div class="col-md-4 col-md-offset-4 error">
            <ul>
                @foreach ($errs as $err)
                    <li>
                        @switch($err)
                            @case('validation.required')
                                Sorry, the post body cannot be empty.
                                @break
                            @case('validation.min.string')
                                Sorry, your post cannot be less than 3 characters.
                                @break
                            @case('validation.max.string')
                                Sorry, your post cannot be more than 3000 characters.
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
