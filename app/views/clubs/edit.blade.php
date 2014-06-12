<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

<ul class="nav navbar-nav">
  <li><a href="{{ URL::to('users/create') }}">Create a user</a>
</ul>
@stop

@section('content')
<h1>All the users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


@stop