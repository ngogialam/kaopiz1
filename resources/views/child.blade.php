@extends('layouts.app')
@section('title', 'Blade Title')
@section('sidebar')
    @parent
    <p>This is appended to the master sidebar</p>

@endsection
@section('content')
    <p>This is my content,</p>
@endsection
