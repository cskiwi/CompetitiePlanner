<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<h1>All the clubs</h1>

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
  @foreach($clubs as $value)
  <tr>
    <td>{{ $value->id }}</td>
    <td>{{ $value->name }}</td>

  </tr>
  @endforeach
  </tbody>
</table>
@stop