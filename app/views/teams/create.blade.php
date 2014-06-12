<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent


@stop

@section('content')
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<h1>Create a Team</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('route' => 'teams.store')) }}

<div class="form-group">
  {{ Form::label('name', 'Name') }}
  {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
</div>
<div>

</div>


{{ Form::submit('Create Team!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop