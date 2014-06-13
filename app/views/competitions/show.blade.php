<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<h1>Club info</h1>

<div class="jumbotron text-center">
  <h2>{{ $comp->HomeTeam->club->name }}
    <small> vs</small>
    {{ $comp->GuestTeam->club->name }}
  </h2>
  <p>
    @if ($comp->played)
    @if ( $comp->winner )
    <strong>Winner:</strong> {{ $comp->winner->club->name }}
    @else
    <strong>Winner:</strong> Draw

    @endif
    @endif

  </p>

</div>

<div class="container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#results" data-toggle="tab">Results</a></li>
    <li><a href="#members" data-toggle="tab">Leden</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active " id="results">
      <h3>Games</h3>
      <hr>
      @foreach ($comp->Details as $detail)
      <div class="col-xs-6 col-md-3 thumbnail">
        @if ($detail->type == 'single')
        <a href="{{ URL::route('users.show', $detail->winner->id) }}">{{ $detail->winner->name }}</a>
        @else
        <a href="{{ URL::route('users.show', $detail->winner[0]->id) }}">{{ $detail->winner[0]->name }}</a> and <a
          href="{{ URL::route('users.show', $detail->winner[1]->id) }}">{{ $detail->winner[1]->name }}</a>
        @endif
      </div>
      @endforeach
    </div>
    <div class="tab-pane" id="members">
      <h3>Users</h3>
      <hr>
      @foreach ($comp->users as $user)
      <div class="col-xs-6 col-md-3">
        <a href="{{ URL::route('users.show', $user->id) }}" class="thumbnail">{{$user->name}}</a>
        <!-- Card template for user info -->
      </div>
      @endforeach
    </div>
  </div>

</div>


@stop
@section('scripts')
<script>
  $(function () {
    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');

    $('.nav-tabs a').click(function (e) {
      $(this).tab('show');
      var scrollmem = $('body').scrollTop();
      window.location.hash = this.hash;
      $('html,body').scrollTop(scrollmem);
    });
  });
</script>
{{ HTML::script('/resources/js/holder.js') }}

@stop