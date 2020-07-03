@extends('_resources.layouts.master')

@section('title')
    Page of {{$username}}
@endsection

@section('content')
<?php
    use App\models\User;
?>
    <h1>Page of {{$username}}</h1>

    @include('_resources.includes._postUpdateErrors')

    <section class="row posts">
        <div class="col-md-6 col-md-3-offset">
            @forelse ($posts as $post)
                @include('_resources.includes._post')
            @empty
                <h3>Sorry, this user has no posts to display.</h3>
            @endforelse
            {!!$posts->links('_resources.vendor.pagination.bootstrap-4')!!}
        </div>
        @include('_resources.includes._editPostModal')
    </section>
@endsection
