<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<h1>Club info</h1>

<div class="jumbotron text-center">
  <h2>{{ $club->name }}
    <small>( {{ $club->tag }} )</small>
  </h2>
  <p>
    <strong>Players:</strong> {{ $club->Users()->count() }}<br>
    <strong>Teams:</strong> {{ $club->Teams()->count() }}<br>
  </p>

</div>


<div class="container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#info" data-toggle="tab">Info</a></li>
    <li><a href="#members" data-toggle="tab">Leden</a></li>
    <li><a href="#teams" data-toggle="tab">Ploegen</a></li>
    <li><a href="#competitions" data-toggle="tab">Competities</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane " id="teams">
      <h3>Teams</h3>
      <hr>
      @foreach ($club->teams as $team)
      <div class="col-xs-6 col-md-3">
        <a href="{{ URL::route('teams.show', $team->id) }}" class="thumbnail">{{$team->name}}</a>
        <!-- Card template for team info -->
      </div>
      @endforeach
    </div>
    <div class="tab-pane" id="members">
      <h3>Users</h3>
      <hr>
      @foreach ($club->users as $user)
      <div class="col-xs-6 col-md-3">
        <a href="{{ URL::route('users.show', $user->id) }}" class="thumbnail">{{$user->name}}</a>
        <!-- Card template for user info -->
      </div>
      @endforeach
    </div>

    <div class="tab-pane " id="competitions">
      @foreach ($club->teams as $team)
      <div class="row">
        <h3>{{$team->name}}</h3>
        @foreach ($team->competitions as $comp)
        <div class="col-xs-6 col-md-3">
          <a href="#" class="thumbnail">{{$comp->start_date}}</a> <!-- Card template for competition info -->
        </div>
        @endforeach
      </div>
      @endforeach
    </div>

    <div class="tab-pane active" id="info">
      <div class="col-sm-4">
        <h3>Contact info</h3>
        <hr>
        <address>
          <strong>Email:</strong> <a href="mailto:#"> name@domain.com</a><br><br>
          <strong>Phone:</strong> (555)123-4567
        </address>
      </div>

      <div class="col-sm-8 contact-form">
        <h3>Send message</h3>
        <hr>
        <form id="contact" method="post" class="form" role="form">
          <div class="row">
            <div class="col-xs-6 col-md-6 form-group">
              <input class="form-control" id="name" name="name" placeholder="Name" type="text" required autofocus/>
            </div>
            <div class="col-xs-6 col-md-6 form-group">
              <input class="form-control" id="email" name="email" placeholder="Email" type="email" required/>
            </div>
          </div>
          <textarea class="form-control" id="message" name="message" placeholder="Message" rows="5"></textarea>
          <br/>

          <div class="row">
            <div class="col-xs-12 col-md-12 form-group">
              <button class="btn btn-primary pull-right" type="submit">Submit</button>
        </form>
      </div>
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