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
  {{ HTML::style('/resources/css/font-awesome.min.css') }}
  {{ HTML::style('/resources/css/chosen.css') }}
  {{ HTML::style('/resources/css/chosen-bootstrap.css') }}
  {{ HTML::style('/resources/css/cp.css') }}
</head>
<body>


<header class="navbar navbar-masthead navbar-default navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
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
        @if($user->club)
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
        @else
        <li><a href="#">Join / Create club</a></li>
        @endif
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span>
            {{$user->name }}<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::route('users.show', $user->id) }}">Info</a></li>
            <li class="divider"></li>
            <li><a href="{{URL::route('logout')}}">Logout</a></li>
          </ul>
        </li>
        @else
        <li><a href="{{ Social::login('facebook') }}"><span class="fa fa-facebook"></span></a></li>
        <li><a href="{{ Social::login('Google') }}"><span class="fa fa-google"></span></a></li>
        @endif
      </ul>

      @if (!Auth::check())

      {{ Form::open(array('route' => 'login', 'class' => 'navbar-form navbar-right' )) }}
      <div class="form-group">
        {{ Form::text('user', null, array('class' => 'form-control', 'placeholder' => 'Username or email')) }}
      </div>
      <div class="form-group">
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
      </div>
      {{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
      {{ Form::close() }}
      @endif


      <div class="navbar-form navbar-left">
        <input type="text" placeholder="Search" class="form-control" id="autocomplete">
      </div>


    </div>
  </div>
</header>

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
{{ HTML::script('/resources/js/chosen.jquery.min.js') }}
{{ HTML::script('/resources/js/jquery.autocomplete.js') }}
<script>

  var a = $('#autocomplete').autocomplete({
    serviceUrl: '/searches',
    paramName: 'input',
    categories: true,
    onSelect: function (value, data) {
      window.location = value.url;
    }

  });
  /*

   $('#autocomplete2').autocomplete({
   serviceUrl: '/searches',
   options: {
   categories: true,
   lookupLimit: 3
   },
   onSelect: function (suggestion) {
   alert('You selected: ' + suggestion.value + ', ' + suggestion.data + ', ' + suggestion.category);
   }
   })
   ;
   */
</script>
@yield('scripts')
</body>
</html>