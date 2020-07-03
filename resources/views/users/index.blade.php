@extends('_resources.layouts.master')

@section('title')
    Registered Users
@endsection

@section('content')
<?php
    use App\models\User;
?>
    <h1>Registered Users on Dragon's Lair</h1>

    <section class="row posts">
        <div class="col-md-6 col-md-3-offset users">
            <ul>
                @foreach ($users as $user)
                    <li>
                        <a href="users/{{$user->userName}}">{{$user->userName}}</a>
                    </li>
                @endforeach
            </ul>
            {!!$users->links('_resources.vendor.pagination.bootstrap-4')!!}
        </div>
    </section>
@endsection
