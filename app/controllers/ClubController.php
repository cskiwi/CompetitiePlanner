<?php

class ClubController extends \BaseController {

  /**
   * Display a listing of the resource.
   * GET /club
   *
   * @return Response
   */
  public function index() {
    $club = Club::All();

    // show the view and pass the user to it
    return View::make( 'clubs.index' )
               ->with( 'clubs', $club );
  }

  /**
   * Show the form for creating a new resource.
   * GET /club/create
   *
   * @return Response
   */
  public function create() {
    return View::make( 'clubs.create' );

  }

  /**
   * Store a newly created resource in storage.
   * POST /club
   *
   * @return Response
   */
  public function store() {
    //
  }

  /**
   * Display the specified resource.
   * GET /club/{id}
   *
   * @param  int $id
   * @return Response
   */
  public function show($id) {
    // get the user
    $club = Club::find( $id );

    // show the view and pass the user to it
    return View::make( 'clubs.show' )
               ->with( 'club', $club );
  }

  /**
   * Show the form for editing the specified resource.
   * GET /club/{id}/edit
   *
   * @param  int $id
   * @return Response
   */
  public function edit($id) {
    //
  }

  /**
   * Update the specified resource in storage.
   * PUT /club/{id}
   *
   * @param  int $id
   * @return Response
   */
  public function update($id) {
    //
  }

  /**
   * Remove the specified resource from storage.
   * DELETE /club/{id}
   *
   * @param  int $id
   * @return Response
   */
  public function destroy($id) {
    //
  }

}