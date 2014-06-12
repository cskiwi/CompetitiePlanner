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

  public function Competitions() {
    return $this->HasMany( 'Competition' );
  }

  public function UpcomingCompetition() {
    return $this->Competitions()->where( 'start_date', '>=', ( new DateTime )->format( 'Y-m-d H:i:s' ) )->get();
  }

  public function PassedCompetition() {
    return $this->Competitions()->where( 'start_date', '<=', ( new DateTime )->format( 'Y-m-d H:i:s' ) )->get();
  }
}