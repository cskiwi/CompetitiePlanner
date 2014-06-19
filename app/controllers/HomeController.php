<?php

class HomeController extends BaseController {
  public function Index() {
    return View::make( 'hello' );
  }

  public function Searches() {
    $input = Input::get('input');
    $users = User::where('name', 'LIKE', "%$input%")->lists('name', 'id');
    $clubs = Club::where('name', 'LIKE', "%$input%")->lists('name', 'id');

    $us ['suggestions'] = [];

    while (list($key, $val) = each($users))
    {
      array_push($us['suggestions'], array(
        "value" => $val,
        "data" => $key,
        "category" => 'User',
        "url" => URL::route('users.show', $key)
      ));
    }
    while (list($key, $val) = each($clubs))
    {
      array_push($us['suggestions'], array(
        "value" => $val,
        "data" => $key,
        "category" => 'Club',
        "url" => URL::route('clubs.show', $key)
      ));
    }

    return Response::json($us);
  }
}
