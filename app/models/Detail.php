<?php

class Detail extends Eloquent {
  protected $table = 'details';
  protected $fillable = [ 'player1_id',
                          'player2_id',
                          'player3_id',
                          'player4_id',
                          'set0_score1',
                          'set0_score2',
                          'set1_score1',
                          'set1_score2',
                          'set2_score1',
                          'set2_score2',
                          'competition_id' ];

  protected $visible = [ 'player1_id' ];

  public function Competition() {
    return $this->belongsTo( 'Competition' );
  }

  public function Player1() {
    return $this->belongsTo( 'User', 'player1_id' );
  }

  public function Player2() {
    return $this->belongsTo( 'User', 'player2_id' );
  }

  public function Player3() {
    return $this->belongsTo( 'User', 'player3_id' );
  }

  public function Player4() {
    return $this->belongsTo( 'User', 'player4_id' );
  }

  public function getPlayedAttribute() {
    $setsT1 = 0;
    $setsT2 = 0;

    // set 1
    $this->set0_score1 > $this->set0_score2 ? $setsT1++ : $setsT2++;
    $this->set1_score1 > $this->set1_score2 ? $setsT1++ : $setsT2++;

    if ($this->set0_score1 != 0 || $this->set0_score2 != 0) {
      if ($this->set1_score1 != 0 || $this->set1_score2 != 0) {
        if ($setsT1 == $setsT2) {
          if ($this->set2_score1 != 0 || $this->set2_score2 != 0) {
            return true;
          }
        } else {
          return true;
        }
      }
      return false;
    }
  }

  public function getWinnerAttribute() {
    $setsT1 = 0;
    $setsT2 = 0;

    // set 1
    $this->set0_score1 > $this->set0_score2 ? $setsT1++ : $setsT2++;
    $this->set1_score1 > $this->set1_score2 ? $setsT1++ : $setsT2++;

    if ($setsT1 == $setsT2) $this->set2_score1 >= $this->set2_score2 ? $setsT1++ : $setsT2++;

    if ($this->type == 'single') {
      return User::find( $setsT1 > $setsT2 ? $this->player1_id : $this->player2_id );
    } else {
      return [ User::find( $setsT1 > $setsT2 ? $this->player1_id : $this->player2_id ),
               User::find( $setsT1 > $setsT2 ? $this->player3_id : $this->player4_id ) ];
    }
  }

  public function getLoserAttribute() {
    if ($this->type == 'single') {
      if ($this->winner) {
        return ( $this->winner == $this->Player1 ) ? $this->Player2 : $this->Player1;
      }
    } else {
      if ($this->winner[0]) {
        return ( $this->winner[0] == $this->Player1 ) ? [ $this->Player2,
                                                          $this->player4 ] : [ $this->Player1,
                                                                               $this->player3 ];
      }
    }
  }
}