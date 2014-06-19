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
      @if($user->club)<strong>Club:</strong> <a href="{{ URL::Route('clubs.show', $user->club->id) }}">{{ $user->club->name }}</a><br>@endif
    </p>
    <table class="table">
      <thead>
      <tr>
        <th class="text-center">Single</th>
        <th class="text-center">Double</th>
        <th class="text-center">&nbsp;Mix&nbsp;&nbsp;</th>
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
  @if($user->club)
  <div class="row">
    <h3>Upcoming Competities</h3>
    <hr>
    @foreach ($user->UpcomingCompetitions as $comp)
    @include('partials.comp', array('comp' => $comp))
    @endforeach
  </div>
  <div class="row">
    <h3>Passed Competities</h3>
    <hr>
    @foreach ($user->PassedCompetitions as $comp)
    @include('partials.comp', array('comp' => $comp))
    @endforeach
  </div>
  @endif
</div>
{{ HTML::script('/resources/js/holder.js') }}

@stop