<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop
@section('content')
<div class="jumbotron text-center">
  <h2>Login</h2>
</div>
<div class="container">

  {{ HTML::ul($errors->all()) }}

  {{ Form::open(array('route' => 'login')) }}

  <div class="form-group">
    {{ Form::label('user', 'Username or email') }}
    {{ Form::text('user', Input::old('user'), array('class' => 'form-control')) }}
  </div>

  <div class="form-group">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'form-control')) }}
  </div>

  {{ Form::submit('Login', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}


  @stop
</div>
