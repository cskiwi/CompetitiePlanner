<?php

class Detail extends Eloquent {
  protected $table    = 'details';
  protected $fillable = [ 'player1_id',
                          'player2_id',
                          'player3_id',
                          'player4_id',
                          'set1_score1',
                          'set1_score2',
                          'set2_score1',
                          'set2_score2',
                          'set3_score1',
                          'set3_score2',
                          'competition_id' ];

  protected $visible = [ 'player1_id' ];

  public function Competition() {
    return $this->belongsTo( 'Competition' );
  }

  public function getWinnerAttribute() {
    $setsT1 = 0;
    $setsT2 = 0;

    // set 1
    $this->set1_score1 > $this->set1_score2 ? $setsT1++ : $setsT2++;
    $this->set2_score1 > $this->set2_score2 ? $setsT1++ : $setsT2++;

    if ($setsT1 == $setsT2) $this->set3_score1 > $this->set3_score2 ? $setsT1++ : $setsT2++;

    if ($this->type == 'single') {
      return User::find( $setsT1 > $setsT2 ? $this->player1_id : $this->player2_id );
    } else {
      return [ User::find( $setsT1 > $setsT2 ? $this->player1_id : $this->player2_id ),
               User::find( $setsT1 > $setsT2 ? $this->player3_id : $this->player4_id ) ];
    }
  }
}