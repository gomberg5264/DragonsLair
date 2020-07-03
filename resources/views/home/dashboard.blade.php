<?php
    use App\models\User;
    use Illuminate\Support\Facades\DB;
    use App\models\Post;
?>
@extends('_resources.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <h1>Dashboard</h1>
    <h2>Welcome {{$user->userName}}</h2>

    @include('_resources.includes._postUpdateErrors')

    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>What do you have to say?</h3>
                <form action="{{route('post.create')}}" method="POST">
                    <div class="form-group {{(isset($check))?'has-error':''}}">
                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post" value=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
            </header>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-3-offset">
            <header>
                <h3>What other people are saying...</h3>
            </header>
            @forelse ($posts as $post)
                @include('_resources.includes._post')
            @empty
                <p>
                    Sorry, there are no posts to display.
                </p>
            @endforelse
            {!!$posts->links('_resources.vendor.pagination.bootstrap-4')!!}
        </div>
        @include('_resources.includes._editPostModal')
    </section>

@endsection
