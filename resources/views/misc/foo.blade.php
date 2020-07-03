@extends('_resources.layouts.master')

@section('title')
    Foo
@endsection

@section('content')
    @if(isset($_POST['editPostID']))
        spam
    @endif
@endsection
