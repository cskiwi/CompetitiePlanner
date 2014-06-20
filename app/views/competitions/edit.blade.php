<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop
@section('content')
<div class="jumbotron text-center">
  <div class="container">

    <div class="col-md-12">
      <div class="col-sm-12 col-md-5 text-center">
        <h2>
          <a href="{{ URL::route('clubs.show', $comp->HomeTeam->club->id) }}">
            {{ $comp->HomeTeam->club->name }}
          </a>
        </h2>
      </div>
      <div class="col-sm-12 col-md-2 text-center"><h2>vs</h2></div>
      <div class="col-sm-12 col-md-5 text-center">
        <h2>
          <a href="{{ URL::route('clubs.show', $comp->GuestTeam->club->id) }}">
            {{ $comp->GuestTeam->club->name }}
          </a>
        </h2>
      </div>
    </div>

    <p>
      @if ($comp->played)
      @if ( $comp->winner )
      <strong>Winner:</strong>
      <a href="{{ URL::route('clubs.show', $comp->winner->club->id) }}">
        {{ $comp->winner->club->name }}
      </a>
      @else
      <strong>Winner:</strong> Draw
      @endif
      @endif
    </p>
  </div>

</div>
<div class="container">
  {{ Form::open(array('route' => array('competitions.update', $comp->id), 'method' => 'put')) }}

  <table class="table">
    <thead>
    <tr>
      <th class="text-center col-xs-4">{{$comp->HomeTeam->name}}</th>
      <th class="text-center col-xs-4">Results</th>
      <th class="text-center col-xs-4">{{$comp->GuestTeam->name}}</th>
    </tr>
    </thead>
    <tbody>

    @foreach($comp->details as $i => $detail)
    <tr>
      <td class="text-center">
        {{ Form::select('detail'.$i.'_player1', $comp->HomeTeam->club->users->lists('name', 'id'), ($detail->player1)?
        $detail->player1->id
        : null, array('class' => 'form-control')) }}

        @if($detail->type == 'double')
        {{ Form::select('detail'.$i.'_player3', $comp->HomeTeam->club->users->lists('name', 'id'), ($detail->player3)?
        $detail->player3->id : null, array('class' => 'form-control')) }}
        @endif
      </td>
      <td class="text-center col-xs-4">
        @if ($comp->start_date < ( new DateTime )->format( 'Y-m-d H:i:s' ) )
        <div class="col-xs-4">{{ Form::text('result' . $i .'_match1', $detail->set0_score1 .'-'.$detail->set0_score2,
          array('class' => 'form-control')) }}
        </div>
        <div class="col-xs-4">{{ Form::text('result' . $i .'_match2', $detail->set1_score1 .'-'.$detail->set1_score2,
          array('class' => 'form-control')) }}
        </div>
        <div class="col-xs-4">{{ Form::text('result' . $i .'_match3', $detail->set2_score1 .'-'.$detail->set2_score2,
          array('class' => 'form-control')) }}
        </div>
        @endif
      </td>
      <td class="text-center">
        {{ Form::select('detail'.$i.'_player2', $comp->GuestTeam->club->users->lists('name', 'id'), ($detail->player2)?
        $detail->player2->id
        : null, array('class' => 'form-control')) }}

        @if($detail->type == 'double')
        {{ Form::select('detail'.$i.'_player4', $comp->GuestTeam->club->users->lists('name', 'id'), ($detail->player4)?
        $detail->player4->id : null, array('class' => 'form-control')) }}
        @endif
      </td>
    </tr>
    @endforeach


    </tbody>
  </table>
  {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
  <a href="{{ URL::route('competitions.show', $comp->id) }}" class="btn btn-default">Close</a>

  {{ Form::close()}}
</div>


@stop
