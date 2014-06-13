<?php

class CompetitionController extends \BaseController {

  /**
   * Display a listing of the resource.
   * GET /competition
   *
   * @return Response
   */
  public function index() {
    $comps = Competition::All();
    return View::make( 'competitions.index' )
               ->with( 'comps', $comps );
  }

  /**
   * Show the form for creating a new resource.
   * GET /competition/create
   *
   * @return Response
   */
  public function create() {
    //
  }

  /**
   * Store a newly created resource in storage.
   * POST /competition
   *
   * @return Response
   */
  public function store() {
    //
  }

  /**
   * Display the specified resource.
   * GET /competition/{id}
   *
   * @param  int $id
   * @return Response
   */
  public function show($id) {
    $comp = Competition::find( $id );
    return View::make( 'competitions.show' )
               ->with( 'comp', $comp );
  }

  /**
   * Show the form for editing the specified resource.
   * GET /competition/{id}/edit
   *
   * @param  int $id
   * @return Response
   */
  public function edit($id) {
    $comp = Competition::find( $id );
    return View::make( 'competitions.edit' )
               ->with( 'comp', $comp );
  }

  /**
   * Update the specified resource in storage.
   * PUT /competition/{id}
   *
   * @param  int $id
   * @return Response
   */
  public function update($id) {
    //
  }

  /**
   * Remove the specified resource from storage.
   * DELETE /competition/{id}
   *
   * @param  int $id
   * @return Response
   */
  public function destroy($id) {
    //
  }
}