<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
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
  <ul class="nav nav-tabs nav-tabs-google">
    <li class="active"><a href="#results" data-toggle="tab">Results</a></li>
    <li><a href="#members" data-toggle="tab">Leden</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active " id="results">
      <h3>Games</h3>
      <hr>
      @foreach ($comp->Details as $detail)
      @include('partials.detail', array('detail' => $detail))
      @endforeach
    </div>
    <div class="tab-pane" id="members">
      <h3>Users</h3>
      <hr>
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