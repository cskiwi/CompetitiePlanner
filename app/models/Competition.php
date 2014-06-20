<?php

class Competition extends Eloquent {
  protected $table = 'competitions';
  protected $fillable = [ 'start_date',
                          'end_date',
                          'home_team_id',
                          'guest_team_id', ];
  protected $visible = [ 'start_date',
                         'end_date',
                         'home_team_id',
                         'guest_team_id', ];

  public function Details() {
    return $this->hasMany( 'Detail' );
  }

  public function HomeTeam() {
    return $this->BelongsTo( 'Team', 'home_team_id' );
  }

  public function GuestTeam() {
    return $this->BelongsTo( 'Team', 'guest_team_id' );
  }

  public function Users() {
    return $this->belongsToMany( 'User' )->where( 'going', '=', 'accepted' );
  }

  public function getWinnerAttribute() {
    $team1 = 0;
    $team2 = 0;

    foreach ($this->details as $detail) {
      if ($detail->played) {
        if ($detail->type == 'single') {
          if ($detail->winner) {
            $detail->winner     ->club->id == $this->home_team_id ? $team1++ : $team2++;
          }
        } else {
          if ($detail->winner[0]) {
            $detail->winner[0]  ->club->id == $this->home_team_id ? $team1++ : $team2++;
          }
        }
      }
    }

    if ($team1 == $team2) {
      return null;
    } elseif ($team1 > $team2) return $this->HomeTeam;
    else return $this->GuestTeam;
  }

  public function getPlayedAttribute() {
    foreach ($this->details as $detail) {
      if ($detail->played == false) return false;
    }
    return true;
  }

  public static function create(array $attributes) {
    $comp = parent::create( $attributes );

    foreach ($comp->HomeTeam->users as $user) {
      $comp->users()->attach( $user );
    }
    foreach ($comp->GuestTeam->users as $user) {
      $comp->users()->attach( $user );
    }

    // create Details
    for ($index = 0; $index < 8; $index++) {
      Detail::create(
        [ 'type' => ( $index < 4 ) ? 'single' : 'double',
          'competition_id' => $comp->id ]
      );
    }
  }
}