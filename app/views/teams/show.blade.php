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
  @if ($team->captains->contains(Auth::User()))
  <button class="btn btn-primary" data-toggle="modal" data-target="#addUser">Add user</button>
  <button class="btn btn-danger" data-toggle="modal" data-target="#deleteUser">Delete user</button>
  @endif
</div>

<div class="container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-tabs-google">
    <li class="active"><a href="#members" data-toggle="tab">Leden</a></li>
    <li><a href="#upcomingCompetition" data-toggle="tab">Upcoming Competition</a></li>
    <li><a href="#passedCompetition" data-toggle="tab">Passed Competition</a></li>
    <li><a href="#captains" data-toggle="tab">Captains</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <div class="tab-pane active" id="members">
        @foreach ($team->users as $user)
        @include('partials.user', array('user' => $user))
        @endforeach
    </div>

    <div class="tab-pane " id="upcomingCompetition">
      @foreach ($team->UpcomingCompetition as $comp)
      @include('partials.comp', array('comp' => $comp))
      @endforeach
    </div>
    <div class="tab-pane " id="passedCompetition">
      @foreach ($team->PassedCompetition as $comp)
      @include('partials.comp', array('comp' => $comp))
      @endforeach
    </div>
    <div class="tab-pane " id="captains">
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
        <h4 class="modal-title">Delete user</h4>
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
        <h4 class="modal-title">Add user</h4>
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
  $(document).ready( function() {
    $("select").chosen({width: "100%"});
  });

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