<?php

class Team extends Eloquent {
  protected $table    = 'teams';
  protected $fillable = [ 'name' ];

  public function Users() {
    return $this->belongsToMany( 'User' );
  }

  public function Club() {
    return $this->belongsTo( 'Club' );
  }

  public function CompetitionsHome() {
    return $this->HasMany( 'Competition', 'home_team_id' );
  }

  public function CompetitionsGuest() {
    return $this->HasMany( 'Competition', 'guest_team_id' );
  }

  public function getCompetitionsAttribute() {
    $competitionsHome = $this->competitionsHome;
    $competitionsGuest = $this->competitionsGuest;
    $competitions = $competitionsHome->merge( $competitionsGuest );

    return $competitions->sortBy( function ($comp) {
      return $comp->start_date;
    } );
  }

  public function UpcomingCompetition() {
    return $this->Competitions()->where( 'start_date', '>=', ( new DateTime )->format( 'Y-m-d H:i:s' ) )->get();
  }

  public function PassedCompetition() {
    return $this->Competitions()->where( 'start_date', '<=', ( new DateTime )->format( 'Y-m-d H:i:s' ) )->get();
  }

  public function Captains() {
    return $this->belongsToMany( 'User', 'team_captain' );
  }
}