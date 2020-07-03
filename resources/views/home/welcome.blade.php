@extends('_resources.layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
<?php
    $errs = $errors->all();
    // print(var_dump($errors));
    $requiredCount = 0;     //Variable to count how many times the "validation.required" error has been triggered. It is a control variable used to suppress duplicate presentations of the error.
?>
    @if ($errs != [])
        <div class="row">
            <div class="col-md-4 col-md-offset-4  error">
                <ul>
                    @foreach ($errs as $err)
                        <li>
                            @switch($err)
                                @case('validation.unique')
                                    Sorry, that email address and/or username has already been taken.
                                    @break
                                @case('validation.email')
                                    Please input a valid email address.
                                    @break
                                @case('validation.required')
<?php
    if($requiredCount == 0)
    {
        print("Sorry all fields are required.");
        $requiredCount++;
    }
?>
                                    @break
                                @case('validation.max.string')
                                    Sorry, the maximum length of the fields are as follows:
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Name</th> <th>Maximum length</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>email</td> <td>250</td>
                                            </tr>
                                            <tr>
                                                <td>username</td> <td>80</td>
                                            </tr>
                                            <tr>
                                                <td>password</td> <td>250</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @break
                                @case('validation.min.string')
                                    Sorry, the minimum length of the password field is 8 characters.
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

    <div class="row">
    	<div class="col-md-6">
    		<h3>Register</h3>
            <form action="{{route('register')}}" method="post">
                <div class="form-group {{($errors->has('email'))?'has-error':''}}">
                    <label for="email">Email address:</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control" type="text" name="username" id="username value="{{Request::old('username')}}">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    	</div>
    	<div class="col-md-6">
    		<h3>Login</h3>
    		<form action="{{route('login')}}" method="post">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input class="form-control" type="text" name="email" id="email2"  value={{Request::old('email')}}>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" id="password2">
                </div>
                <input type="hidden" name="_token" value={{Session::token()}}>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    	</div>
    </div>
@endsection
