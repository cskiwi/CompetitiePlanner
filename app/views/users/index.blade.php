<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<h1>All the users</h1>

<table class="table table-striped table-bordered">
  <thead>
  <tr>
    <td>Name</td>
    <td>Email</td>
    <td>Single</td>
    <td>Double</td>
    <td>Mix</td>
  </tr>
  </thead>
  <tbody>
  @foreach($users as $value)
  <tr>
    <td><a href="{{ URL::route('users.show' , $value->id) }}">{{ $value->name }} </a></td>
    <td>{{ $value->email }}</td>
    <td>{{ $value->single }}</td>
    <td>{{ $value->double }}</td>
    <td>{{ $value->mix }}</td>
  </tr>
  @endforeach
  </tbody>
</table>
@stop