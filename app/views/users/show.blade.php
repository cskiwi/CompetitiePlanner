<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<div class="jumbotron text-center">
  <div class="container">

    @if($user->photo)
    <img src="{{$user->photo}}" name="img" class="img-circle pic"></a>
    @endif
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
        <td>&nbsp;&nbsp;Mix&nbsp;</td>
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

</div>

<div class="container">
  <div class="row">
    <h3>Competities</h3>
    <hr>
    @foreach ($user->competitions as $comp)
    @include('partials.comp', array('comp' => $comp))
    @endforeach
  </div>

  <div class="row">
    <h3>Captain Of</h3>
    <hr>
    @foreach ($user->captainOf as $team)
    @include('partials.team', array('team' => $team))
    @endforeach
  </div>
</div>
{{ HTML::script('/resources/js/holder.js') }}

@stop