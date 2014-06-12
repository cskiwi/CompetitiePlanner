<!-- app/views/users/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
  <title>Competition planner</title>
  {{ HTML::style('/resources/css/bootstrap.min.css') }}
  {{ HTML::style('/resources/css/cp.css') }}
</head>
<body>
<div class="container">
  <div class="navbar navbar-default">
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
        <li><a href="{{ URL::route('users.index') }}">Users</a></li>
      </ul>

      @if (Auth::check())
      {{--*/ $user = Auth::User() /*--}}

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">My club<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{URL::route('clubs.show', $user->club->id)}}">Overview</a></li>
            <li><a href="#">Upcomming competitions</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Dropdown header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$user->name }}<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::route('users.show', $user->id) }}">Info</a></li>
            <li class="divider"></li>
            <li><a href="{{URL::route('logout')}}">Logout</a></li>
          </ul>
        </li>
      </ul>
      @else

      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ Social::login('facebook') }}">Facebook</a></li>
            <li><a href="{{ Social::login('Google') }}">Google</a></li>
            <li class="divider"></li>
            <li><a href="#">Normal</a></li>
          </ul>
        </li>
      </ul>
      @endif
      <form class="navbar-form navbar-left">
        <input type="text" class="form-control col-lg-8" placeholder="Search">
      </form>
    </div>
  </div>


  <div class="container">
    @yield('content')
  </div>
</div>
{{ HTML::script('/resources/js/jquery.min.js') }}
{{ HTML::script('/resources/js/bootstrap.min.js') }}
@yield('scripts')
</body>
</html>