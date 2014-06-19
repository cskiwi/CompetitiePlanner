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

  @foreach($comps as $comp)
  @include('partials.comp', array('comp' => $comp))
  @endforeach
  @stop

</div>