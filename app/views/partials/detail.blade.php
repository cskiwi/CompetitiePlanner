<div class="col-xs-6 col-md-3 thumbnail">
  @if ($detail->type == 'single')
  <a href="{{ URL::route('users.show', $detail->winner->id) }}">{{ $detail->winner->name }}</a>
  @else
  <a href="{{ URL::route('users.show', $detail->winner[0]->id) }}">{{ $detail->winner[0]->name }}</a> and <a
    href="{{ URL::route('users.show', $detail->winner[1]->id) }}">{{ $detail->winner[1]->name }}</a>
  @endif
</div>