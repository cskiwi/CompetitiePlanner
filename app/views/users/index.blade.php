<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<div class="jumbotron text-center">
  <h2>Users</h2>
</div>
<div class="container">

  @foreach($users as $user)
  @include('partials.user', array('user' => $user))
  @endforeach
  @stop

</div>