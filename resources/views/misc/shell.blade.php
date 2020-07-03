@extends('_resources.layouts.master')

@section('title')
    Shell
@endsection

@section('content')
<?php

?>
    {{url()->current()}}
    <?="<script>document.writeln(editPostID);</script>"?>
@endsection
