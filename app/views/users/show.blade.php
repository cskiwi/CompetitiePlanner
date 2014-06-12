<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<h1>User info</h1>

<div class="jumbotron text-center">
  <h2>{{ $user->name }}</h2>

  <p>
    <strong>Email:</strong> {{ $user->email }}<br>
    <strong>Club:</strong> <a href="{{ URL::Route('clubs.show', $user->club->id) }}">{{ $user->club->name }}</a><br>
  </p>
  <table class="table">
    <thead>
    <tr>
      <td>Single</td>
      <td>Double</td>
      <td>Mix</td>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>{{ $user->single }}</td>
      <td>{{ $user->double }}</td>
      <td>{{ $user->mix }}</td>
    </tr>
    </tbody>
  </table>
</div>


<div class="row">
  <h3>Competities</h3>
  <hr>
  @foreach ($user->competitions as $comp)
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">{{$comp->start_date}}</a> <!-- Card template for competitions info -->
  </div>
  @endforeach
</div>
{{ HTML::script('/resources/js/holder.js') }}

@stop