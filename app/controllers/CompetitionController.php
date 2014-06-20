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
    $comp = Competition::find( $id );
    $now = ( new DateTime )->format( 'Y-m-d H:i:s' );

    if ($comp) {
      if ($comp->HomeTeam->captains->contains( Auth::User() )) {
        // echo $comp->HomeTeam->name . ' captain';

        $players = Input::only(
          'detail0_player1', 'detail1_player1', 'detail2_player1', 'detail3_player1', 'detail4_player1',
          'detail4_player3', 'detail5_player1', 'detail5_player3', 'detail6_player1', 'detail6_player3',
          'detail7_player1', 'detail7_player3'
        );
        $results = Input::only(
          'result0_match1', 'result0_match2', 'result0_match3', 'result1_match1', 'result1_match2', 'result1_match3',
          'result2_match1', 'result2_match2', 'result2_match3', 'result3_match1', 'result3_match2', 'result3_match3',
          'result4_match1', 'result4_match2', 'result4_match3', 'result5_match1', 'result5_match2', 'result5_match3',
          'result6_match1', 'result6_match2', 'result6_match3', 'result7_match1', 'result7_match2', 'result7_match3'
        );

        foreach ($comp->details as $i => $detail) {
          $detail->player1_id = $players['detail' . $i . '_player1'];
          if ($detail->type == 'double') {
            $detail->player3_id = $players['detail' . $i . '_player3'];
          }

          if ($comp->start_date < $now) {
            $res = str_replace(
              ' ', '', [ $results['result' . $i . '_match1'],
                         $results['result' . $i . '_match2'],
                         $results['result' . $i . '_match3'] ]
            );

            foreach ($res as $set => $result) {
              if ($result) {
                $points = explode( '-', $result );
                $detail->{'set' . $set . '_score1'} = $points[0];
                $detail->{'set' . $set . '_score2'} = $points[1];
              }
            }
          }
          $detail->save();
        }

        $comp->save();
      }
      if ($comp->GuestTeam->captains->contains( Auth::User() ) || $comp->start_date < $now) {
        // echo $comp->GuestTeam->name . ' captain';
        $players = Input::only(
          'detail0_player2', 'detail1_player2', 'detail2_player2', 'detail3_player2', 'detail4_player2',
          'detail4_player4', 'detail5_player2', 'detail5_player4', 'detail6_player2', 'detail6_player4',
          'detail7_player2', 'detail7_player4'
        );

        $details = $comp->details;
        foreach ($details as $i => $detail) {
          $detail->player2_id = $players['detail' . $i . '_player2'];
          if ($detail->type == 'double') {
            $detail->player4_id = $players['detail' . $i . '_player4'];
          }
          $detail->save();
        }
      }
    }
    return Redirect::route( 'competitions.edit', $id );
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