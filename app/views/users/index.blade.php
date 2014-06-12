<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<h1>All the users</h1>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
  <thead>
  <tr>
    <td>ID</td>
    <td>Name</td>
    <td>Email</td>
    <td>Single</td>
    <td>Double</td>
    <td>Mix</td>
    <td>Actions</td>
  </tr>
  </thead>
  <tbody>
  @foreach($users as $value)
  <tr>
    <td>{{ $value->id }}</td>
    <td>{{ $value->name }}</td>
    <td>{{ $value->email }}</td>
    <td>{{ $value->single }}</td>
    <td>{{ $value->double }}</td>
    <td>{{ $value->mix }}</td>

    <td>
      {{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }}
      {{ Form::hidden('_method', 'DELETE') }}
      {{ Form::submit('Delete this user', array('class' => 'btn btn-warning')) }}
      {{ Form::close() }}
      <a class="btn btn-small btn-success" href="{{ URL::route('users.show' , $value->id) }}">Show</a>
      <a class="btn btn-small btn-info" href="{{ URL::route('users.edit',$value->id) }}">Edit</a>
    </td>
  </tr>
  @endforeach
  </tbody>
</table>
@stop