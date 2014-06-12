<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<h1>All the teams</h1>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
  <thead>
  <tr>
    <td>ID</td>
    <td>Name</td>
  </tr>
  </thead>
  <tbody>
  @foreach($teams as $value)
  <tr>
    <td>{{ $value->id }}</td>
    <td><a href="{{ URL::Route('teams.show', $value->id) }}">{{ $value->name }} </a></td>
  </tr>
  @endforeach
  </tbody>
</table>
@stop