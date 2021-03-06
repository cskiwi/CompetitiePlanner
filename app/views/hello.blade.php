<!-- app/views/users/index.blade.php -->
@extends('layout.master')

@section('sidebar')
@parent

@stop

@section('content')
<div class="jumbotron text-center">
  <h2>Index</h2>
</div>
<div class="container">
  <h3>Clubs</h3>

  <div class="row">
    @foreach(Club::All() as $club)
    @include('partials.club', array('club' => $club))
    @endforeach
  </div>
  @if (App::environment('local'))
  <h3>Form</h3>

  <p>This is some dummy data for a form</p>

  <form class="form-horizontal">
    <fieldset>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Email</label>

        <div class="col-lg-10">
          <input class="form-control" id="inputEmail" placeholder="Email" type="text">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Password</label>

        <div class="col-lg-10">
          <input class="form-control" id="inputPassword" placeholder="Password" type="password">

          <div class="checkbox">
            <label>
              <input type="checkbox"> Checkbox
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="textArea" class="col-lg-2 control-label">Textarea</label>

        <div class="col-lg-10">
          <textarea class="form-control" rows="3" id="textArea"></textarea>
        <span
          class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Radios</label>

        <div class="col-lg-10">
          <div class="radio">
            <label>
              <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
              Option one is this
            </label>
          </div>
          <div class="radio">
            <label>
              <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
              Option two can be something else
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="select" class="col-lg-2 control-label">Selects</label>

        <div class="col-lg-10">
          <select class="form-control" id="select">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          <br>
          <select multiple="" class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </fieldset>
  </form>
  @endif

</div>

@stop