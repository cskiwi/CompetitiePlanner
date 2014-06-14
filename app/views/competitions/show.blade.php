<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<div class="jumbotron text-center">
  <div class="container">

    <div class="col-md-12">
      <div class="col-sm-12 col-md-5"><h2>{{ $comp->HomeTeam->club->name }}</h2> <br /> <h4>{{$comp->HomeTeam->name}}</h4></div>
      <div class="col-sm-12 col-md-2"><h1>vs</h1></div>
      <div class="col-sm-12 col-md-5"><h2>{{ $comp->GuestTeam->club->name }}</h2> <br /> <h4>{{$comp->GuestTeam->name}}</h4></div>
    </div>

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

</div>

<div class="container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-tabs-google">
    <li class="active"><a href="#results" data-toggle="tab">Results</a></li>
    <li><a href="#members" data-toggle="tab">Spelers</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active " id="results">
      @foreach ($comp->Details as $detail)
      @include('partials.detail', array('detail' => $detail))
      @endforeach
    </div>
    <div class="tab-pane" id="members">
      @foreach ($comp->users as $user)
      @include('partials.user', array('user' => $user))
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