<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<div class="jumbotron text-center">
  <h2>Teams</h2>
</div>
<div class="container">

  @foreach($teams as $team)
  @include('partials.team', array('team' => $team))
  @endforeach
  @stop

</div>