<a href="{{ URL::route('users.show', $user->id) }}">
  <div class="col-xs-12 col-md-4 user-profile">
    <div class="col-xs-12 col-sm-5">
      @if($user->photo)
      <div class="img-profile" style="background-image:url({{ $user->photo }})"></div>
      @else
      <div class="img-profile" style="background-image:url({{URL::asset('/resources/img/Default_Profile.jpg')}})"></div>
      @endif
    </div>
    <div class="col-xs-12 col-sm-7">
      <span class="name">{{ $user->name }}</span><br/>
      <span class="club"> <a href="{{ url::route('clubs.show', $user->club->id) }}">{{$user->club->name}}</a> </span><br/>
      <span class="skills"><small>Single: </small>{{ $user->single }}, <small>Double: </small> {{ $user->double }}, <small>Mix: </small> {{ $user->mix }}</span><br/>
    </div>
  </div>
</a>