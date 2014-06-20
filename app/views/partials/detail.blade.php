<div class="col-xs-6 col-md-3 thumbnail">
  @if ($detail->played )
  @if ($detail->type == 'single')

  @if($winner = $detail->winner)
  Winner : <a href="{{ URL::route('users.show', $winner->id) }}">{{ $winner->name }}</a> <br/>
  @endif
  @if($loser = $detail->loser)
  Loser : <a href="{{ URL::route('users.show', $loser->id) }}">{{ $loser->name }}</a>
  @endif

  @else

  @if(($winner1 = $detail->winner[0]) && ($winner2 = $detail->winner[1]))
  Winners : <a href="{{ URL::route('users.show', $winner1->id) }}">{{ $winner1->name }}</a> and <a href="{{ URL::route('users.show', $winner2->id) }}">{{ $winner2->name }}</a>
  @endif

  @if(($loser1 = $detail->loser[0]) && ($loser2 = $detail->loser[1]))
  Losers : <a href="{{ URL::route('users.show', $loser1->id) }}">{{ $loser1->name }}</a> and <a href="{{ URL::route('users.show', $loser2->id) }}">{{ $loser2->name }}</a>
  @endif

  @endif
  @else
  <p>Isn't played yet</p>
  @endif
</div>