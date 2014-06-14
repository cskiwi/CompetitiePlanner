<!-- app/views/users/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Competition planner</title>
  {{ HTML::style('/resources/css/bootstrap.min.css') }}
  {{ HTML::style('/resources/css/todc-bootstrap.min.css') }}
  {{ HTML::style('/resources/css/cp.css') }}
</head>
<body>


<div class="navbar navbar-toolbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{URL::route('index')}}">Competitie planner</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right ">
        @if (Auth::check())
        {{--*/ $user = Auth::User() /*--}}
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">My club<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{URL::route('clubs.show', $user->club->id)}}">Overview</a></li>
            <li><a href="#">Upcomming competitions</a></li>
            <li><a href="#">Passed competitions</a></li>
            <li class="divider"></li>
            @foreach($user->teams as $team)
            <li><a href="{{URL::route('teams.show', $team->id)}}">{{$team->name}}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
            {{$user->name }}<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::route('users.show', $user->id) }}">Info</a></li>
            <li class="divider"></li>
            <li><a href="{{URL::route('logout')}}">Logout</a></li>
          </ul>
          @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ Social::login('facebook') }}">Facebook</a></li>
            <li><a href="{{ Social::login('Google') }}">Google</a></li>
            <li class="divider"></li>
            <li><a href="{{ URL::route('login') }}">Normal</a></li>
          </ul>
        </li>
        @endif

      </ul>
      <form class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="Search...">
      </form></div>
  </div>
</div>

<div class="content">
  <div class="container">
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
  </div>
  @yield('content')
</div>
{{ HTML::script('/resources/js/jquery.min.js') }}
{{ HTML::script('/resources/js/bootstrap.min.js') }}
@yield('scripts')
</body>
</html>