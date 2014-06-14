<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<div class="jumbotron text-center">
  <h2>Clubs</h2>
</div>
<div class="container">

  @foreach($clubs as $club)
  @include('partials.club', array('club' => $club))
  @endforeach
  @stop

</div>