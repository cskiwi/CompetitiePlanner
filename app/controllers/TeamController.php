<?php

class TeamController extends \BaseController {

  /**
   * Display a listing of the resource.
   * GET /team
   *
   * @return Response
   */
  public function index() {
    $teams = Team::all();

    // load the view and pass the users
    return View::make( 'teams.index' )
               ->with( 'teams', $teams );
  }

  /**
   * Show the form for creating a new resource.
   * GET /team/create
   *
   * @return Response
   */
  public function create() {
    return View::make( 'teams.create' );
  }

  /**
   * Store a newly created resource in storage.
   * POST /team
   *
   * @return Response
   */
  public function store() {
    $rules = array( 'name' => 'required', );
    $validator = Validator::make( Input::all(), $rules );

    // process the login
    if ($validator->fails()) {
      return Redirect::to( 'teams/create' )
                     ->withErrors( $validator );
    } else {
      // store
      $user = new Team;
      $user->name = Input::get( 'name' );
      $user->club_id = Auth::user()->club->id;
      $user->save();

      // redirect
      Session::flash( 'message', 'Successfully created team!' );
      return Redirect::to( 'teams' );
    }
  }

  /**
   * Display the specified resource.
   * GET /team/{id}
   *
   * @param  int $id
   * @return Response
   */
  public function show($id) {
    $team = Team::find( $id );

    // show the view and pass the user to it
    return View::make( 'teams.show' )
               ->with( 'team', $team );
  }

  /**
   * Show the form for editing the specified resource.
   * GET /team/{id}/edit
   *
   * @param  int $id
   * @return Response
   */
  public function edit($id) {
    //
  }

  /**
   * Update the specified resource in storage.
   * PUT /team/{id}
   *
   * @param  int $id
   * @return Response
   */
  public function update($id) {
    //
  }

  /**
   * Remove the specified resource from storage.
   * DELETE /team/{id}
   *
   * @param  int $id
   * @return Response
   */
  public function destroy($id) {
    //
  }

  /**
   * Update the specified resource in storage.
   * POST /addUser/{id}
   *
   * @param  int $id
   * @return Response
   */
  public function addUser($id) {
    $team = Team::find( $id );

    foreach (Input::get( 'addUser' ) as $userID) {
      $user = User::find( $userID );

      if ($user != null && $team != null) $team->users()->attach( $user );
    }
    return Redirect::route( 'teams.show', $id );
  }

  public function deleteUser($id) {

    $team = Team::find( $id );
    if ($team->captains->contains( Auth::User() )) {
      foreach (Input::get( 'addUser' ) as $userID) {
        $user = User::find( $userID );

        if ($user != null && $team != null) $team->users()->detach( $user );
      }
    } else {
      Session::flash( 'error', 'You are not the captain!' );
    }
    return Redirect::route( 'teams.show', $id );
  }
}