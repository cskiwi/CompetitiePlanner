<div class="col-xs-6 col-md-3">
  <a href="{{ URL::route('teams.show', $team->id) }}" class="thumbnail"> {{$team->name}} ({{$team->users()->count()}})</a>
</div>