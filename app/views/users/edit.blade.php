<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')

<h1>Edit {{ $user->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('updateUser', $user->id))) }}

<div class="form-group">
  {{ Form::label('name', 'Name') }}
  {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
  {{ Form::label('email', 'Email') }}
  {{ Form::email('email', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
  {{ Form::label('password', 'Password') }}
  {{ Form::password('password', array('class' => 'form-control')) }}
</div>

{{ Form::submit('Edit the user!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop