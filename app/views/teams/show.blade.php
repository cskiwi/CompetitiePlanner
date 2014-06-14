<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<div class="jumbotron text-center">
  <h2>{{ $team->name }}</h2>

  <p>
    <strong>Players:</strong> {{ $team->Users()->count() }}<br>
    <strong>Club:</strong> <a href="{{ URL::Route('clubs.show', $team->club->id) }}">{{ $team->club->name }}</a><br>
  </p>

</div>

<div class="container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-tabs-google">
    <li class="active"><a href="#members" data-toggle="tab">Leden</a></li>
    <li><a href="#competitions" data-toggle="tab">Competities</a></li>
    <li><a href="#captains" data-toggle="tab">Captains</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <div class="tab-pane active" id="members">
      <h3>Users
        @if ($team->captains->contains(Auth::User()))
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addUser">Add user</button>
        <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#deleteUser">delete user</button>
        @endif
      </h3>
      <hr>
      @foreach ($team->users as $user)
      <div class="col-xs-6 col-md-3">
        <a href="{{ URL::route('users.show', $user->id) }}" class="thumbnail">{{$user->name}}</a>
        <!-- Card template for user info -->
      </div>
      @endforeach
    </div>

    <div class="tab-pane " id="competitions">
      <div class="row">
        <h3>Upcoming Competition</h3>
        <hr>
        @foreach ($team->UpcomingCompetition as $comp)
        @include('partials.comp', array('comp' => $comp))
        @endforeach
      </div>
      <div class="row">
        <h3>Passed Competition</h3>
        <hr>
        @foreach ($team->PassedCompetition as $comp)
          @include('partials.comp', array('comp' => $comp))
        @endforeach
      </div>
    </div>
    <div class="tab-pane " id="captains">
      <h3>Captains</h3>
      <hr>
      @foreach ($team->captains as $captain)
      @include('partials.user', array('user' => $captain))
      @endforeach

    </div>
  </div>

</div>


<div class="modal fade" id="deleteUser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        @if ( ($users = $team->users->lists('name', 'id')) != null)
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('route' => array('teams.deleteUser', $team->id))) }}

        <div class="form-group">
          {{ Form::select('addUser[]', $users, Input::old('client_id'), array('class' => 'form-control', 'multiple' =>
          true)) }}
        </div>
        @else
        <div class="form-group">
          No users in this team!
        </div>

        @endif
      </div>
      <div class="modal-footer">
        {{ Form::submit('Close', array('class' => 'btn btn-default', 'data-dismiss' => 'modal')) }}
        {{ Form::submit('Delete user!', array('class' => 'btn btn-danger')) }}
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addUser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        @if (($users = $team->club->users()->whereNotIn('id', (($teamUsers = $team->users()->lists('user_id')) != null)
        ? $teamUsers : [0] )->lists('name','id')) != null)
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('route' => array('teams.addUser', $team->id))) }}

        <div class="form-group">
          {{ Form::select('addUser[]', $users, Input::old('client_id'), array('class' => 'form-control', 'multiple' =>
          true)) }}
        </div>
        @else
        <div class="form-group">
          All the users are already in this team
        </div>

        @endif
      </div>
      <div class="modal-footer">
        {{ Form::submit('Close', array('class' => 'btn btn-default', 'data-dismiss' => 'modal')) }}
        {{ Form::submit('Add user!', array('class' => 'btn btn-primary')) }}
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