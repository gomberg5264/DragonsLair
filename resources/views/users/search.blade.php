@extends('_resources.layouts.master')

@section('title')
    Search
@endsection

@section('content')
<?php
    use App\models\User;
?>
    @include('_resources.includes._editPostModal')
@endsection
